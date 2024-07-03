<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CartDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'product' => new ProductResource($this->product),
        ];
    }
}
