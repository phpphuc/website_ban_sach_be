<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'photoURL' => 'required|string',
            'description' => 'required|string',

            'isbn' => 'nullable|string|max:255|required_if:type,book',
            'file_format' => 'nullable|string|max:255|required_if:type,electronic',
            'duration' => 'nullable|integer|min:0|required_if:type,audio',
            'type' => 'required|string|in:electronic,audio,book',

            'category_id' => 'required|exists:categories,id',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
        ];
    }
}
