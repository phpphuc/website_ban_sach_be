<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class AuthorRequest extends FormRequest{
  public function rules(): array{
    return [
      'name' => 'required|string|max:255',
      'photo_url' => 'required|string|max:255',
    ];
  }
}