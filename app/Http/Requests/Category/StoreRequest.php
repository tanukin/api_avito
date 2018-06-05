<?php

namespace App\Http\Requests\Category;

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
            'title' => 'required|string|max:250',
            'parentId' => 'nullable|integer',
            'lifetime' => 'required|integer'
        ];
    }
}