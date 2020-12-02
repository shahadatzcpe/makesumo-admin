<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\AssetSetResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\PaginatedCollection;
use App\Models\Asset;
use App\Models\AssetSet;
use App\Models\Color;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Spatie\Browsershot\Browsershot;

class AssetSetController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all(['search', 'trashed', 'asset_type', 'subscription']);
        $assetSets = AssetSet::filter($filters)->paginate(1)->withQueryString();

        $assetSets->getCollection()->transform(function ($assetSet) {
            return [
                'id' => $assetSet->id,
                'name' => $assetSet->name,
                'description' => $assetSet->description,
                'thumbnail_src' => $assetSet->thumbnail_src,
                'total_items' => $assetSet->totalItems,
                'background_color' => $assetSet->bg_color,
                'asset_type' => $assetSet->asset_type,
                'is_free' => $assetSet->is_free,
                'is_trashed' => !!$assetSet->deleted_at,
            ];
        });

        $props = [
            'filters' => $filters,
            'asset_sets' => $assetSets,
            'asset_types' => array_values(config('makesumo.asset_types'))
        ];


        return  Inertia::render('AssetSet/Index', $props);
    }
    public function store(StoreCategoryRequest $request)
    {
        $as = new AssetSet();
        $as->name = $request->name;
        $as->description = $request->description;
        $as->bg_color = $request->bg_color;
        $as->txt_color = $request->txt_color;
        $as->asset_type = $request->asset_type;
        $as->thumbnail_path = $request->thumbnail->store("assets");
        $as->save();

        return redirect()->route('asset-sets.upload-items', $as);
    }

    public function create()
    {
        return Inertia::render('AssetSet/Create', [
            'asset_types' => array_values(config('makesumo.asset_types')),
        ]);
    }

    public function uploadForm(AssetSet $assetSet)
    {
        $props = [
            'asset_set' => $assetSet,
        ];

        return Inertia::render('AssetSet/UploadForm', $props);
    }
    public function show(Request $request, AssetSet $assetSet)
    {
        $props['asset_set'] = $assetSet;
        $props['items'] = ItemResource::collection($assetSet->publishedItems)->collection;

        return  Inertia::render('AssetSet/Show', $props);
    }

    public function pendingItems(AssetSet $assetSet)
    {
         $props['asset_set'] = $assetSet;
         $props['items'] = ItemResource::collection($assetSet->draftItems)->collection;
        return Inertia::render('AssetSet/PendingItems', $props);
    }

    public function uploadItem(Request $request, AssetSet $assetSet)
    {

        $ext = $request->file('file')->getClientOriginalExtension();
        $name = pathinfo($request->file('file')->getClientOriginalName(),  PATHINFO_FILENAME);

        $item = new Item();
        $item->name = \Str::title(preg_replace('/-|_| /i', ' ', $name));
        $item->thumbnail_path = $ext != 'zip' ? $request->file('file')->store('thumbnails') : null;
        $item->asset_set_id = $assetSet->id;
        $item->asset_type = $assetSet->asset_type;
        $item->save();


        if($ext != 'zip') {
            $asset = new Asset();
            $asset->path = $request->file('file')->store('assets');
            $asset->original_name = $request->file('file')->getClientOriginalName();
            $asset->item_id = $item->id;
            $asset->save();
            return 1;
        }


        $uploadedFile = $request->file('file')->store('zip');
        $folderName = md5($uploadedFile);
        $filePath = storage_path('app/public/' .  $uploadedFile);


        $zip = new \ZipArchive();
        if ($zip->open($filePath) === true) {
            $images = [];
            for($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                $fileinfo = pathinfo($filename);
                $relativePath = "assets/$folderName-".$fileinfo['basename'];
                copy("zip://".$filePath."#".$filename, storage_path("app/public/$relativePath"));

                $asset = new Asset();
                $asset->path = $relativePath;
                $asset->original_name = $fileinfo['basename'];
                $asset->item_id = $item->id;
                $asset->save();
                $images[] = $asset->src;
            }

            if($images) {
                $fileName =  md5($item->id . time()) . '.png';
                $savePath = storage_path('app/public/thumbnails/') . $fileName ;
                $html = view('renderable.item-thumbnail-generator', ['images' => $images]);
                $img = Browsershot::html($html)->clip(0, 0, 200, 200)->hideBackground()
                    ->save($savePath);
                $item->thumbnail_path = 'thumbnails/' .  $fileName;
                $item->save();
            }

            $zip->close();
        }

        return 2;
    }



    public function updateItems(AssetSet $assetSet, Request $request)
    {
        $colors = [];

        foreach($request->items as $itemData) {
            $item = Item::find($itemData['id']);
            $item->name = $itemData['name'];
            $item->status = $request->status;
            $item->save();
            $item->updateTags($itemData['tags']);
            $colors = array_merge($colors, $itemData['colors']);
        }

        $editablecolors = array_filter($colors, function($item) {
            return $item['is_editable'];
        });

        $notEditablecolors = array_filter($colors, function($item) {
            return !$item['is_editable'];
        });


        Color::whereIn('id', array_column($editablecolors, 'id'))->update(['is_editable' => 1]);
        Color::whereIn('id', array_column($notEditablecolors, 'id'))->update(['is_editable' => 0]);

        return response()->redirectToRoute('asset-sets.show', $assetSet);
    }


    public function toggleFreeItem(Request $request, AssetSet $assetSet)
    {
        $assetSet->is_free = !$assetSet->is_free;
        $assetSet->save();

        return Redirect::back();
    }
}
