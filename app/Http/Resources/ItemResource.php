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
        $x =  parent::toArray($this);
//        $x['thumbnail_src'] = $x['thumbnail_path'];

        return  $x;
    }
}
