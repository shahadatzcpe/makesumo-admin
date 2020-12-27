<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetSet;
use App\Models\Item;
use App\PopularityEngine\PopularityEngine;
use App\RelatedEngine\RelatedEngine;
use App\SearchEngine\SearchEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class IllustrationController extends Controller
{
    public function __construct()
    {
        $this->props['search_results'] = [];
        $this->props['related_keywords'] = [];
        $this->props['popular_items'] = [];
        $this->props['asset_sets'] = [];
        $this->props['asset_set'] = (object) [];
        $this->props['search'] = \request('search') ?: '';
    }

    public function index(Request $request, SearchEngine $searchEngine, PopularityEngine $popularityEngine) {
       $this->setupProps($request, $searchEngine, $popularityEngine);

       return Inertia::render('Illustrations/Index', $this->props);
   }


   public function assetSet(Request $request,AssetSet $assetSet, SearchEngine $searchEngine, PopularityEngine $popularityEngine)
   {
       $this->setupProps($request, $searchEngine, $popularityEngine);

       $assetset = $assetSet->load(['items']);
       $this->props['asset_set'] = $assetset->only(['id', 'name', 'url', 'thumbnail_src', 'description']);
       $this->props['asset_set']['items'] = $assetset->items->map(function ($item) {
           return [
               'id' => $item->id,
               'slug' => $item->slug,
               'name' => $item->name,
               'thumbnail_src' => Storage::url($item->thumbnail_path),
               'asset_type' => $item->asset_type,
               'url' => $item->url,
           ];
       });


       return Inertia::render('Illustrations/Index', $this->props);
   }

   public function show(Request $request, AssetSet $assetSet, Item $item, RelatedEngine $relatedEngin, PopularityEngine $popularityEngine)
   {
       $this->props['item'] = $item->load([
           'assets' => function($query) {
               $query->with([
                   'colors' => function ($query) {
                       $query->where('is_editable', 1);
                   }
               ]);
            },
           'tags']);

       $this->props['related_items'] = $relatedEngin->getRelatedItems($item);
       $this->props['popular_items'] = $popularityEngine->getIllustrations();
       $this->props['open_modal'] = $request->ajax();

       return Inertia::render('Illustrations/Illustration', $this->props);
   }



   private function setupProps(Request $request, SearchEngine $searchEngine, PopularityEngine $popularityEngine)
   {
       if($request->search) {
           $this->props['search_results'] = $searchEngine->getIllustrations();
           $this->props['related_keywords'] = $searchEngine->getRelatedKeywords(4);
       }

       if(!$this->props['search_results']) {
           $this->props['popular_items'] = $popularityEngine->getIllustrations();
           $this->props['asset_sets'] = $searchEngine->getIllustrationSets();
       }
   }
}
