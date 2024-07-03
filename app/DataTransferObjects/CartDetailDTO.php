<?php

namespace App\DataTransferObjects;

use App\Http\Requests\Api\CartDetailRequest;

class CartDetailDTO implements ModelDTO
{
    public $user_id;
    public $product_id;
    public $quantity;

    public function __construct($user_id, $product_id, $quantity)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public static function fromRequest(CartDetailRequest $request): self
    {
        return new self(
            $request->input('user_id'),
            $request->input('product_id'),
            $request->input('quantity')
        );
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
        ];
    }
}
