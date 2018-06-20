<?php

namespace App\Http\Requests\City;

use App\Http\Requests\CommonCoreRequest;

/**
 * Class ListRequest
 * @package App\Http\Requests\City
 */
class ListRequest extends CommonCoreRequest
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
            'offset' => 'integer',
            'limit' => 'integer',
        ];
    }
}
