<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest implements AdvertisementRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|max:50',
            'price' => 'integer',
            'description' => 'string',
            'categoryId' => 'integer',
            'cityId' => 'integer',
            'userId' => 'string|max:36',
            'address' => 'string|max:50',
            'phone' => 'string|max:12',
            'images' => 'array',
            'images.*' => 'string|max:255'
        ];
    }
}
