<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'assets' => $this->assets->map(function ($asset) {
                return [
                    'has_colours' => $asset->colors->isNotEmpty(),
                    'asset_id' => $asset->id,
                    'src' => $asset->src
                ];
            }),
            'colours' => $this->colours->map(function($colour) {
                return [
                    'color_id' => $colour->id,
                    'asset_id' => $colour->colourable_id,
                    'colour_code' => $colour->colour_code,
//                    'new_color_code' => $colour->colour_code,
//                    'colour_type' => $colour->colour_type,
                    'is_editable' => (bool) $colour->is_editable,
                ];
            })
        ];
    }
}
