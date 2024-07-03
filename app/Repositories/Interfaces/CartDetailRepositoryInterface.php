<?php

namespace App\Repositories\Interfaces;

use App\DataTransferObjects\CartDetailDTO;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Collection;

interface CartDetailRepositoryInterface
{
    public function getAll(): Collection;
    public function findById($id): ?CartDetail;
    public function findByUser($userId): Collection;
    public function create(CartDetailDTO $cartDetailDTO): CartDetail;
    public function update($id, CartDetailDTO $cartDetailDTO): bool;
    public function delete($id): bool;
}
