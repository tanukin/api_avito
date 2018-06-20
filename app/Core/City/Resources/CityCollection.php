<?php

namespace App\Core\City\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class CityCollection
 * @package App\Core\City\Resources
 */
class CityCollection extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'total' => $this->collection->count(),
            'items' => $this->collection
        ];
    }
}