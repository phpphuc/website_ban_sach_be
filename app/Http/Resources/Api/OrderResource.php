<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use App\Http\Resources\Api\OrderDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_date' => $this->order_date,
            'address' => $this->address,
            'total_amount' => $this->total_amount,
            'is_paid' => $this->is_paid,
            'receiver_name' => $this->receiver_name,
            'phone_number' => $this->phone_number,
            'order_details' => OrderDetailResource::collection($this->orderDetails),
        ];
    }
}