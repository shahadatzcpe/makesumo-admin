<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\AssetSetCollection;
use App\Http\Resources\AssetSetResource;
use App\Http\Resources\PaginatedCollection;
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


        return redirect()->route('asset-sets.index');
    }

    public function create()
    {
        return Inertia::render('AssetSet/Create', [
            'asset_types' => array_values(config('makesumo.asset_types')),
        ]);
    }

    public function uploadForm()
    {
        return Inertia::render('AssetSet/UploadForm');
    }
    public function show(Request $request, $assetSet)
    {
        return  Inertia::render('AssetSet/Show');
    }

    public function pendingItems()
    {
        return Inertia::render('AssetSet/PendingItems');
    }
}
