<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExecutorRequest extends FormRequest
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
           'Last_name'=> 'required|string',
           'First_name'=> 'required|string',
           'Middle_name'=> 'required|string',
           'Phone'=> 'required|string',
           'Specialization'=> 'required|string',
           'experience'=> 'required|integer',
           'address'=> 'required|string',
        ];
    }
}
