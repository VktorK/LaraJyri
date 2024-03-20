<?php

namespace App\Http\Requests\Order;

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
            'created_from'=> 'nullable|date_format:Y-m-d',
            'created_to'=> 'nullable|date_format:Y-m-d',
            'total_sum_from'=> 'nullable|numeric',
            'total_sum_to'=> 'nullable|numeric'
        ];
    }
}
