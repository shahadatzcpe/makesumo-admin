<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\AssetSetResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\PaginatedCollection;
use App\Models\Asset;
use App\Models\AssetSet;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssetSetController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all(['search', 'trashed', 'asset_type']);
        $assetSets = AssetSet::filter($filters)->paginate(50);
        $props = [
            'filters' => $filters,
            'asset_sets' => new PaginatedCollection($assetSets, AssetSetResource::class),
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
    public function show(Request $request, $assetSet)
    {
        return  Inertia::render('AssetSet/Show');
    }

    public function pendingItems(AssetSet $assetSet)
    {

         $props['items'] = ItemResource::collection($assetSet->items)->collection;

        return Inertia::render('AssetSet/PendingItems', $props);
    }

    public function uploadItem(Request $request, AssetSet $assetSet)
    {
        $uploadedFile = $request->file('file');

        $item = new Item();
        $item->name = $uploadedFile->getClientOriginalName();
        $item->thumbnail_path = $uploadedFile->store('thumbnails');
        $item->asset_set_id = $assetSet->id;
        $item->asset_type = $assetSet->asset_type;
        $item->save();

        $asset = new Asset();
        $asset->path = $uploadedFile->store('assets');
        $asset->original_name = $uploadedFile->getClientOriginalName();
        $asset->item_id = $item->id;
        $asset->save();

        return;
    }
}
