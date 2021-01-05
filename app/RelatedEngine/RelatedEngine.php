<?php

namespace App\RelatedEngine;

use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class RelatedEngine{

    public function getRelatedItems(Item  $item, $limit = 12, $offset = 0) {
        $needMoreItem = $limit;


        $collection = Item::search('')->where('asset_type', Item::mapAssetTypeCode($item->asset_type))
            ->take($needMoreItem)
            ->get();


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
