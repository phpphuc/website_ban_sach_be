<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AccountRegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string|max:255', //['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['nullable', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'gender' => ['nullable', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'username.max' => 'Username phải có độ dài ngắn hơn 255 kí tự',
        ];
    }
}
