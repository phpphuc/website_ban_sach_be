<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest{
  public function rules(): array{
    return [
      'title' => 'required|string|max:255',
    ];
  }
}