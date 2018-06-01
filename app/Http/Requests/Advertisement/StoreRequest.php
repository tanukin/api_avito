<?php

namespace App\Http\Requests\Advertisement;

use App\Http\Requests\CommonCoreRequest;

class StoreRequest extends CommonCoreRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'price' => 'required|integer',
            'description' => 'required|string',
            'categoryId' => 'required|integer',
            'cityId' => 'required|integer',
            'userId' => 'required|string|max:36',
            'address' => 'required|string|max:50',
            'phone' => 'required|string|max:12',
            'images' => 'array',
            'images.*' => 'string|max:255'
        ];
    }
}
