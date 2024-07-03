<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\CartDetailDTO;
use App\Models\CartDetail;
use Illuminate\Database\Eloquent\Collection;

interface CartDetailServiceInterface
{
  public function getAllCartDetails(): Collection;
  public function getCartDetailById(int $id): ?CartDetail;
  public function getCartDetailByUser(int $userId): Collection;
  public function createCartDetail(CartDetailDTO $cartDetailDTO): CartDetail;
  public function updateCartDetail(int $id, CartDetailDTO $cartDetailDTO): bool;
  public function deleteCartDetail(int $id): bool;
}