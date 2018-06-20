<?php

namespace App\Http\Requests\City;

use App\Http\Requests\CommonCoreRequest;

/**
 * Class StoreRequest
 * @package App\Http\Requests\City
 */
class StoreRequest extends CommonCoreRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
        ];
    }
}
