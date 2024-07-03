<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }
    public function rules(): array
    {
        return [
            'title' => ['required','max:80'],
            'body' => ['required','max:80'],
        ];
    }
    
}
