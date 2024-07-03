<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\OrderDTO;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderServiceInterface
{
  public function getAllOrders(): Collection;
  public function getOrderById(int $id): ?Order;
  public function getOrdersByUserId(int $userId): Collection;
  public function createOrder(OrderDTO $orderDTO): Order;
  public function updateOrder(int $id, OrderDTO $orderDTO): bool;
  public function deleteOrder(int $id): bool;
}