<?php

namespace App\RelatedEngine;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class RelatedEngine{

    public function getRelatedItems(Item  $item, $limit = 12, $offset = 0) {
        $collection =   Item::where('asset_type', $item->asset_type)->limit(12)->get();

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
}
