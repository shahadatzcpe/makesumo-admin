<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginatedCollection extends ResourceCollection
{
    private $resourceClass;

    public function __construct($resource, $resourceClass)
    {
        parent::__construct($resource);
        $this->resource = $this->collectResource($resource);
        $this->resourceClass = $resourceClass;
        $this->resource->withQueryString();
    }


    public function toArray($request)
    {
        return $this->resourceClass::collection($this->collection);
    }
}
