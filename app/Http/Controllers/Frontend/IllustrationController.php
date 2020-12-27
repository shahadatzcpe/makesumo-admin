<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetSet;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class IllustrationController extends Controller
{
   public function index(Request $request)
   {
       $this->setupProps($request);
       return Inertia::render('Illustrations/Index', $this->props);
   }

   public function assetSet(Request $request, $assetSetSlug)
   {
       $this->setupProps($request);
       $assetset = AssetSet::findBySlug($assetSetSlug)->only(['id', 'name', 'url', 'thumbnail_src', 'description']);

       $assetset['description'] = 'Grain styled illustrations are pixel-perfect and available in both free PNG & SVG format for you.
We cook unique illustration styles everyday. Get beautiful, handcrafted digital assets
for your projects – without paying big-agency-price-tag.';
       $this->props['assetSet'] = $assetset;
       return Inertia::render('Illustrations/Index', $this->props);
   }

   public function show(Request $request, AssetSet $assetSet, Item $item)
   {
       $this->props['item'] = $item->load([
           'assets' => function($query) {
               $query->with([
                   'colors' => function ($query) {
                       $query->where('is_editable', 1);
                   }
               ]);
            }]);

       $this->setupProps($request);

//       return $this->props;
//
       return Inertia::render('Illustrations/Index', $this->props);
   }



   private function setupProps(Request $request)
   {
       $collection =  $collection = Item::filter($request)->take(24)->get();

       $collection =  $collection->map(function ($item) {
           return [
               'id' => $item->id,
               'slug' => $item->slug,
               'name' => $item->name,
               'thumbnail_src' => Storage::url($item->thumbnail_path),
               'asset_type' => $item->asset_type
           ];
       });

       $assetSetCollection = AssetSet::where('asset_type', 'illustration')->take(24)->get();

       $assetSetCollection = $assetSetCollection->map(function($assetSet) {
           return [
               'id' => $assetSet->id,
               'name' => $assetSet->name,
               'thumbnail_src' => Storage::url($assetSet->thumbnail_path),
               'bg_color' => $assetSet->bg_color,
               'url' => $assetSet->url
           ];
       });

       $this->props['assetSets'] = []; $assetSetCollection;
       $this->props['items'] = []; $collection;
       $this->props['search'] = $request->search ?: '';
   }
}
