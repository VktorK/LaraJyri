<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreTransactionDebetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (int) auth()->id() === (int) $this->order->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        ];
    }

    protected function passedValidation()
    {
        if(auth()->user()->profile()->balance < $this->order->total_price){
            throw ValidationException::withMessages([
                'message'=>'Недостаточно средств для покупки'
            ]);
        }
    }
}
