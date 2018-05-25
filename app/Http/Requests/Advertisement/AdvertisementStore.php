<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementStore extends FormRequest
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
            'title' => 'required|max:50',
            'price' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|integer',
            'categoryId' => 'required|integer',
            'cityId' => 'required|integer',
            'userId' => 'required|string|max:36',
            'address' => 'required|string|max:50',
            'phone' => 'required|string|max:12',
        ];
    }
}
