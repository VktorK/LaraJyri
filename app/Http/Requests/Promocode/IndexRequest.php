<?php

namespace App\Http\Requests\Promocode;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code'=>'nullable|string',
            'value'=>'nullable|integer',
            'date_of_end_from'=>'nullable|date_format:Y-m-d',
            'date_of_end_to'=>'nullable|date_format:Y-m-d',
            'limit_from_from'=>'nullable|date_format:Y-m-d',
            'limit_from_to'=>'nullable|date_format:Y-m-d',
            'created_from'=>'nullable|date_format:Y-m-d',
            'created_to'=>'nullable|date_format:Y-m-d',
        ];
    }
}
