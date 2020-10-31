<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AssetSetCollection extends ResourceCollection
{


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $data = $this->collection->transform(function($assetSet) {
                $x =  $assetSet->toArray();
                $x['thumbnail_src'] = $x['thumbnail_path'];
                $x['number_of_assets'] = rand(0, 100);

                return  $x;
            });

        return [
            'data' => $data,
            'links' => dd($this->collection),
        ];
    }


}
