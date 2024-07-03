<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required','max:80'],
            'password' => ['required','max:80'],
            'email' => ['required','max:80'],
            'gender' => ['required','max:80'],
        ];
    }
}
