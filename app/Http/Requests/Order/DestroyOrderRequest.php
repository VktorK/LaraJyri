<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class DestroyOrderRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status_is_new' => 'required|integer|in:1'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'status_is_new' => $this->route('order')->status_idx != 3,
        ]);
    }

    public function messages()
    {
        return [
            'status_is_new' => 'Заказ оплачен, удалить нельзя'
        ];
    }
}
