<?php

namespace App\Http\Requests\Product;

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
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'price_from' => 'nullable|numeric',
            'price_to' => 'nullable|numeric',
            'created_from' => 'nullable|date_format:Y-m-d',
            'created_to' => 'nullable|date_format:Y-m-d',
            'categories_of_product_id'=> 'nullable|integer'
        ];
    }
}
