<?php

namespace App\Http\Requests\Executor;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'Last_name' => 'nullable|string',
            'First_name' => 'nullable|string',
            'Middle_name' => 'nullable|string',
            'Phone' => 'nullable|integer',
            'Specialization' => 'nullable|string',
            'experience_from' => 'nullable|integer',
            'experience_to' => 'nullable|integer',
            'address' => 'nullable|string',
            'created_from' => 'nullable|date_format:Y-m-d',
            'created_to' => 'nullable|date_format:Y-m-d'
        ];
    }
}
