<?php

namespace App\Core\Advertisement\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdvertisementCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'total' => $this->collection->count(),
            'items' => $this->collection
        ];
    }
}