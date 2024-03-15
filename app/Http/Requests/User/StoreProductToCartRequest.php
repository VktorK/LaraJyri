<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductToCartRequest extends FormRequest
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
            'product_id' => 'required|integer|exists:products,id',
            'qty' => 'required|integer|min:1'
        ];
    }
}