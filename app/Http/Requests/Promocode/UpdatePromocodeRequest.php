<?php

namespace App\Http\Requests\Promocode;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromocodeRequest extends FormRequest
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
            "value" => 'required|string',
            "date_of_end" => 'required|date',
            "summ" => 'required|numeric',
            "summ_from" => 'required|numeric',
            "user" => 'required|string',
        ];
    }
}
