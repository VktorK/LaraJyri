<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'is_products_in_cart' => 'required|integer|in:1'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'is_products_in_cart' => auth()->user()->productsInCart->count() > 0 ? 1 : 0
        ]);
    }

    public function messages()
    {
        return [
            'is_products_in_cart.in' => 'Корзина пуста'
        ];
    }
}
