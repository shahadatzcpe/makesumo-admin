<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Tag;
use App\PopularityEngine\PopularityEngine;
use App\SearchEngine\SearchEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->props['popular_illustrations'] = [];
        $this->props['popular_illustrations3d'] = [];
    }

   public function globalSearch(Request $request, SearchEngine $searchEngine, PopularityEngine  $popularityEngine)
   {
       $this->props['search_results'] = $this->getSearchResults($request->search);
       $this->props['search'] = $request->search;
       $this->props['related_keywords'] = $searchEngine->getRelatedKeywords(4, $request->search);

       $this->props['popular_illustrations3d'] = $popularityEngine->get3DIllustrations(12);
       $this->props['popular_illustrations'] = $popularityEngine->getIllustrations(12);

       return Inertia::render('Search/Index', $this->props);
   }


   private function getSearchResults($search)
   {
       $hasItem = Item::search($search)->exist();
       $results =  [
           'has_items' => $hasItem,
           Item::ICON => 0 ? $this->getResultsByItemType($search, Item::ILLUSTRATION) : [],
           'illustration3d' => $hasItem ?$this->getResultsByItemType($search, Item::ILLUSTRATION3D): [],
           Item::ILLUSTRATION => $hasItem ? $this->getResultsByItemType($search, Item::ILLUSTRATION): [],
       ];

       $results['total'] = array_sum(array_column($results, 'count'));

       return $results;
   }


   private function getResultsByItemType($search, $type)
   {
       $collection = Item::search($search)->where('asset_type', Item::mapAssetTypeCode($type))->take(8)->get();

       $needMoreItem = 8 - $collection->count();

       if($needMoreItem) {
           $items = Item::where('asset_type', $type)
               ->orderByDesc('page_views')
               ->whereNotIn('id', $collection->pluck('id'))
               ->take($needMoreItem)
               ->get();

           $collection = $collection->merge($items);
       }

       $total = Item::search($search)->where('asset_type', Item::mapAssetTypeCode($type))->count();

       $collection =  $collection->map(function ($item) {
            return [
                'id' => $item->id,
                'slug' => $item->slug,
                'name' => $item->name,
                'thumbnail_src' => Storage::url($item->thumbnail_path),
                'asset_type' => $item->asset_type,
                'url' => $item->url
            ];
       });

       return [
           'items' => $collection,
           'count' => max($total, $collection->count())
       ];
   }
}
