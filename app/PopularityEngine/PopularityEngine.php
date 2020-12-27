<?php

namespace App\PopularityEngine;

use App\Models\Item;
use App\Models\Tag;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Support\Facades\Storage;

class PopularityEngine{

    public function get3DItems($limit, $offset) {

    }

    public function getIllustrations($limit = 40, $offset = 0) {
        $collection =   Item::take(24)->get();

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
