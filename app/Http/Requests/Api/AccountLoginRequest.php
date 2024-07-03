<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class AccountLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // 'username' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:255',//['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
    public function messages()
    {
        return [
            'username.max' => 'Username phải có độ dài ngắn hơn 255 kí tự',
        ];
    }
}