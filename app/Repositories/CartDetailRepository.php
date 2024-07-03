<?php

namespace App\Repositories;

use App\DataTransferObjects\CartDetailDTO;
use App\Models\CartDetail;
use App\Repositories\Interfaces\CartDetailRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CartDetailRepository implements CartDetailRepositoryInterface
{
    public function getAll(): Collection
    {
        return CartDetail::all();
    }

    public function findById($id): ?CartDetail
    {
        return CartDetail::find($id);
    }

    public function findByUser($userId): Collection
    {
        return CartDetail::where('user_id', $userId)->get();
    }

    public function create(CartDetailDTO $cartDetailDTO): CartDetail
    {
        // dd($cartDetailDTO->toArray());
        return CartDetail::create($cartDetailDTO->toArray());
    }

    public function update($id, CartDetailDTO $cartDetailDTO): bool
    {
        $cartDetail = CartDetail::find($id);
        if ($cartDetail) {
            $cartDetail->update($cartDetailDTO->toArray());
            return true;
        }
        return false;
    }

    public function delete($id): bool
    {
        $cartDetail = CartDetail::find($id);
        if ($cartDetail) {
            $cartDetail->delete();
            return true;
        }
        return false;
    }
}
