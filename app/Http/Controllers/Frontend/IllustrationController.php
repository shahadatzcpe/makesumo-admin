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

       $this->props['items'] = $collection;
       $this->props['search'] = $request->search;

       return Inertia::render('Illustrations/Index', $this->props);
   }

   public function assetSet($assetSet)
   {
       return Inertia::render('Illustrations/AssetSet', $this->props);
   }

   public function show(AssetSet $assetSet, Asset $asset)
   {

   }
}
