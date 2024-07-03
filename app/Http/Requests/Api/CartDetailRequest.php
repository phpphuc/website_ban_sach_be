<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class CartDetailRequest extends FormRequest{


  public function rules()
  {
      return [
          // 'user_id' => 'required|exists:users,id',
          'user_id' => 'required|exists:accounts,id',
          'product_id' => 'required|exists:products,id',
          'quantity' => 'required|integer|min:1',
      ];
  }

}