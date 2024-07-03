<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;


class OrderRequest extends FormRequest{

  public function rules()
  {
      return [
          'user_id' => 'required|exists:users,id',
          'address' => 'required|string|max:255',
          // 'total_amount' => 'required|numeric|min:0',
          'receiver_name' => 'required|string|max:255',
          'phone_number' => 'required|string|max:20',
      ];
  }

}