<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Tag;
use App\SearchEngine\SearchEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SearchController extends Controller
{
   public function globalSearch(Request $request, SearchEngine $searchEngine)
   {
       $tag = Tag::where('name', $request->search)->first();

       $this->props['search_results'] = $this->getSearchResults($tag);
       $this->props['search'] = $request->search;
       $this->props['related_keywords'] = $searchEngine->getRelatedKeywords(4);
       return Inertia::render('Search/Index', $this->props);
   }


   private function getSearchResults($tag)
   {
       $results =  [
           'has_items' => $tag instanceof Tag,
           Item::ICON => $this->getResultsByItemType($tag, Item::ILLUSTRATION),
           Item::ILLUSTRATION3D => $this->getResultsByItemType($tag, Item::ILLUSTRATION),
           Item::ILLUSTRATION => $this->getResultsByItemType($tag, Item::ILLUSTRATION),
       ];

       $results['total'] = array_sum(array_column($results, 'count'));

       return $results;
   }


   private function getResultsByItemType($tag, $type)
   {
       if(!($tag instanceof Tag)) {
           return [
               'items' => [],
               'count' => 0
           ];
       }

       $collection = $tag->items()->where('asset_type', $type)->take(8)->get();

       $collection =  $collection->map(function ($item) {
            return [
                'id' => $item->id,
                'slug' => $item->slug,
                'name' => $item->name,
                'thumbnail_src' => Storage::url($item->thumbnail_path),
                'asset_type' => $item->asset_type
            ];
       });

       return [
           'items' => $collection,
           'count' => $tag->items()->where('asset_type', $type)->count()
       ];
   }
}
