<?php

namespace App\Http\Requests\UserTrue;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        "name" => 'required|string',
        "email" => 'required|string|unique:users,email',
        "password" => 'required|string',
        "password_confirmation" => 'required|string|same:password'
        ];
    }

    protected function passedValidation()
    {
        return $this->replace([
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ]);
    }
}
