<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class CommonCoreRequest extends FormRequest
{
    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        $response = [
            'errors' => $validator->errors()->all()
        ];

        throw new HttpResponseException(response()->json($response,Response::HTTP_BAD_REQUEST));
    }
}