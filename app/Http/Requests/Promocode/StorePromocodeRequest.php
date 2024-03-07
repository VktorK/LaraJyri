<?php

namespace App\Http\Requests\Promocode;

use Illuminate\Foundation\Http\FormRequest;

class StorePromocodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "code" => 'required|string',
            "value" => 'required|integer',
            "date_of_end" => 'required|date',
            "limit_from" => 'required|integer',
        ];
    }
}


