<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tags' => $this->tags->pluck('name'),
            'thumbnail_src' => Storage::url($this->thumbnail_path),
            'assets' => $this->assets->map(function ($asset) {
                return [
                    'has_colors' => $asset->colors->isNotEmpty(),
                    'asset_id' => $asset->id,
                    'src' => $asset->src
                ];
            }),
            'colors' => $this->colors->map(function($color) {
                return [
                    'color_id' => $color->id,
                    'asset_id' => $color->colorable_id,
                    'color_code' => $color->color_code,
//                    'new_color_code' => $color->color_code,
//                    'color_type' => $color->color_type,
                    'is_editable' => (bool) $color->is_editable,
                ];
            }),
            'detected_color' => 7,
            'editable_color' => 3,
            'pageviews' => 10000,
            'download' => 1200
        ];
    }
}
