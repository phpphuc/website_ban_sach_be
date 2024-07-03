<?php

namespace App\Services;

use App\DataTransferObjects\CartDetailDTO;
use App\Models\CartDetail;
use App\Repositories\Interfaces\CartDetailRepositoryInterface;
use App\Services\Interfaces\CartDetailServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class CartDetailService implements CartDetailServiceInterface
{
    protected $cartDetailRepository;

    public function __construct(CartDetailRepositoryInterface $cartDetailRepository)
    {
        $this->cartDetailRepository = $cartDetailRepository;
    }

    public function getAllCartDetails(): Collection
    {
        return $this->cartDetailRepository->getAll();
    }

    public function getCartDetailById($id): ?CartDetail
    {
        return $this->cartDetailRepository->findById($id);
    }

    public function getCartDetailByUser($userId): Collection
    {
        return $this->cartDetailRepository->findByUser($userId);
    }

    public function createCartDetail(CartDetailDTO $cartDetailDTO): CartDetail
    {
        // dd($cartDetailDTO->toArray());
        return $this->cartDetailRepository->create($cartDetailDTO);
    }

    public function updateCartDetail($id, CartDetailDTO $cartDetailDTO): bool
    {
        return $this->cartDetailRepository->update($id, $cartDetailDTO);
    }

    public function deleteCartDetail($id): bool
    {
        return $this->cartDetailRepository->delete($id);
    }
}
