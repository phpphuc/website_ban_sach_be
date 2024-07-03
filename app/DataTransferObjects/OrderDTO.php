<?php


namespace App\DataTransferObjects;

use Illuminate\Http\Request;

class OrderDTO implements ModelDTO
{
    public function __construct(
        public readonly int $user_id,
        public readonly string $address,
        public readonly string $order_date,
        public readonly string $receiver_name,
        public readonly string $phone_number,
    ) {
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            order_date: now(),
            user_id: $request->input('user_id'),
            address: $request->input('address'),
            receiver_name: $request->input('receiver_name'),
            phone_number: $request->input('phone_number'),
        );
    }

    public static function fromModel($order): self
    {
        return new self(
            order_date: $order->order_date,
            user_id: $order->user_id,
            address: $order->address,
            receiver_name: $order->receiver_name,
            phone_number: $order->phone_number,
        );
    }

    public function toArray(): array
    {
        return [
            'total_amount' => 0,
            'order_date' => $this->order_date,
            'user_id' => $this->user_id,
            'address' => $this->address,
            'is_paid' => false,
            'receiver_name' => $this->receiver_name,
            'phone_number' => $this->phone_number,
        ];
    }
}
