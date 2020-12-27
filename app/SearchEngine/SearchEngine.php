<?php

namespace App\SearchEngine;

use App\Models\AssetSet;
use App\Models\Item;
use App\Models\Tag;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\Storage;

class SearchEngine{

    public function getRelatedKeywords($limit = 4) {
        return Tag::inRandomOrder()->take($limit)->pluck('name');
    }

    public function get3DItems($limit, $offset) {

    }

    public function getIllustrationSets($limit = 12, $offset = 0) {
        $assetSetCollection = AssetSet::where('asset_type', 'illustration')->take($limit)->get();

        $assetSetCollection = $assetSetCollection->map(function($assetSet) {
            return [
                'id' => $assetSet->id,
                'name' => $assetSet->name,
                'thumbnail_src' => Storage::url($assetSet->thumbnail_path),
                'bg_color' => $assetSet->bg_color,
                'url' => $assetSet->url
            ];
        });

        return $assetSetCollection->toArray();
    }

    public function getIllustrations($limit = null, $offset = null) {
        $collection =   Item::filter(request())->get();

        $collection =  $collection->map(function ($item) {
            return [
                'id' => $item->id,
                'slug' => $item->slug,
                'name' => $item->name,
                'thumbnail_src' => Storage::url($item->thumbnail_path),
                'asset_type' => $item->asset_type,
                'url' => $item->url,
            ];
        });

        return $collection->toArray();
    }

    public function getIcons($limit, $offset) {

    }
}
