<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            "Last_name"=> 'required|string',
            "First_name"=> 'required|string',
            "Middle_name"=> 'required|string',
            "gender"=> 'required|integer',
            "date_of_but"=> 'required|date',
            "residential_address"=> 'required|string',
            "login"=> 'required|string',
            "balance"=> 'required|numeric'
        ];
    }
}

