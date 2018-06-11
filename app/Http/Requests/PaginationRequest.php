<?php
namespace App\Http\Requests;


class PaginationRequest extends CommonCoreRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'offset' => 'integer',
            'limit' => 'integer',
        ];
    }
}
