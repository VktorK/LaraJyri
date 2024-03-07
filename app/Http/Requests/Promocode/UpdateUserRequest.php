<?php

namespace App\Http\Requests\Promocode;

use App\Models\Promocode;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code'=>'required|string|exists:promocodes,code'
        ];
    }

    protected function passedValidation()
    {
        return $this->replace([
            'promocode' => Promocode::where('code',$this->code)->first(),
        ]);
    }
}
