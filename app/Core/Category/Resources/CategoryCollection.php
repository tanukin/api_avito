<?php

namespace App\Core\Category\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'total' => $this->collection->count(),
            'items' => $this->collection
        ];
    }
}