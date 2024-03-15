<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class DestroyProductRequest extends FormRequest
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
            'product_id' => 'required|integer|exists:product_user,product_id',
            'status_is_new' => 'required|integer|in:1'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'status_is_new' => $this->route('order')->status_idx == 1,
        ]);
    }

    public function messages()
    {
        return [
            'status_is_new' => 'Статус не 1'
        ];
    }
}
