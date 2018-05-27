<?php

namespace App\Http\Requests\Advertisement;

use App\Http\Requests\CommonCoreRequest;

class ListRequest extends CommonCoreRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'categoryId' => 'integer',
            'cityId' => 'integer',
            'userId' => 'required|string',
            'publishedAt' => 'date',
            'offset' => 'integer',
            'limit' => 'integer',
        ];
    }
}
