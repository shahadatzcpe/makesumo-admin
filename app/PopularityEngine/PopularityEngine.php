<?php

namespace App\PopularityEngine;

use App\Models\Asset;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class PopularityEngine{

    public function get3DIllustrations($limit = 40, $offset = 0) {
        $collection =   Item::take($limit)->where('asset_type', Item::ILLUSTRATION3D)->orderbyDesc('page_views')->get();

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

        return $collection;
    }

    public function getIllustrations($limit = 40, $offset = 0) {
        $collection =   Item::take($limit)->where('asset_type', Item::ILLUSTRATION)->orderbyDesc('page_views')->get();

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
        return $collection;
    }

    public function getIcons($limit, $offset) {

    }
}
