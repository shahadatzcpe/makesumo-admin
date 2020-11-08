<?php

namespace App\Http\Controllers;


use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;
use App\Http\Resources\PaginatedCollection;
use App\Models\AssetSet;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->all(['search', 'trashed', 'subscription', 'asset_type']);
        $items = Item::filter($filters)->with(['assetSet', 'tags'])->paginate(1)->withQueryString();

        $items->getCollection()->transform(function ($item) {
           return [
               'id' => $item->id,
               'name' => $item->name,
               'preview_src' => 'https://picsum.photos/150',
               'pageviews' => rand(5,100),
               'downloads' => rand(5,100),
               'detected_colors_count' => $item->colors->count(),
               'editable_colors' => $item->colors->pluck('color_code'),
               'tags' => $item->tags->pluck('name'),
               'asset_set' => [
                   'id' => $item->assetSet->id,
                   'name' => $item->assetSet->name,
                   'asset_type' => $item->assetSet->asset_type,
               ]
            ];
        });

        $props = [
            'filters' => $filters,
            'items' => $items,
            'asset_types' => array_values(config('makesumo.asset_types'))
        ];

        return Inertia::render('Items/Index', $props);
    }
}
