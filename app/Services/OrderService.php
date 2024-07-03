<?php

namespace App\Services;

use App\Models\Order;
use App\Models\CartDetail;
use App\DataTransferObjects\OrderDTO;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Interfaces\OrderServiceInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders(): Collection
    {
        return $this->orderRepository->getAll();
    }

    public function getOrderById($id): ?Order
    {
        return $this->orderRepository->findById($id);
    }

    public function getOrdersByUserId($userId): Collection
    {
        return $this->orderRepository->findByUser($userId);
    }

    public function createOrder(OrderDTO $orderDTO): Order
    {
        $order = $this->orderRepository->create($orderDTO);

        $totalAmount = 0;
        $cartDetails = CartDetail::where('user_id', $order->user_id)->get();
        $totalAmount = 0;
        foreach ($cartDetails as $cartDetail) {
            $orderDetail = $this->orderRepository->createOrderDetail([
                'order_id' => $order->id,
                'product_id' => $cartDetail->product_id,
                'quantity' => $cartDetail->quantity,
                'price' => $cartDetail->product->price * $cartDetail->quantity,
            ]);
            $totalAmount += $orderDetail->price;
        }
        $cartDetails->each->delete();

        $this->orderRepository->update($order->id, ['total_amount' => $totalAmount]);

        return $order;
    }

    public function updateOrder($id, OrderDTO $orderDTO): bool
    {
        return $this->orderRepository->update($id, $orderDTO);
    }

    public function deleteOrder($id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
