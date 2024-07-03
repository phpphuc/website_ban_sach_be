<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetail;
use App\DataTransferObjects\OrderDTO;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll(): Collection
    {
        return Order::all();
    }

    public function findById($id): ?Order
    {
        return Order::find($id);
    }

    public function findByUser($userId): Collection
    {
        return Order::where('user_id', $userId)->get();
    }

    public function create(OrderDTO $orderDTO): Order
    {
        // dd($orderDTO->toArray());
        return Order::create($orderDTO->toArray());
    }

    public function createOrderDetail($array): OrderDetail
    {
        return OrderDetail::create($array);
    }

    public function update($id, $array): bool
    {
      $order = Order::find($id);
        if ($order) {
            $order->update(
                [
                    'total_amount' => $array['total_amount']
                ]
            );
            return true;
        }
        return false;
    }

    public function delete($id): bool
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            return true;
        }
        return false;
    }
}
