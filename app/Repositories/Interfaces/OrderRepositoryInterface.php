<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;
use App\Models\OrderDetail;
use App\DataTransferObjects\OrderDTO;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function getAll(): Collection;
    public function findById($id): ?Order;
    public function findByUser($userId): Collection;
    public function create(OrderDTO $orderDTO): Order;
    public function createOrderDetail($array): OrderDetail;
    public function update($id, $array): bool;
    public function delete($id): bool;
}
