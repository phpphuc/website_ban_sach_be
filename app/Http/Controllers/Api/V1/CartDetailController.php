<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\CartDetailDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartDetailRequest;
use App\Http\Resources\Api\CartDetailResource;
use App\Services\Interfaces\CartDetailServiceInterface;
use Illuminate\Http\JsonResponse;

class CartDetailController extends Controller
{
    protected $cartDetailService;

    public function __construct(CartDetailServiceInterface $cartDetailService)
    {
        $this->cartDetailService = $cartDetailService;
    }

    public function index(): JsonResponse
    {
        return response()->json(CartDetailResource::collection($this->cartDetailService->getAllCartDetails()), 200);
    }

    public function show($id): JsonResponse
    {
        $cartDetail = $this->cartDetailService->getCartDetailById($id);
        if ($cartDetail) {
            return response()->json(CartDetailResource::make($cartDetail), 200);
        }
        return response()->json(['message' => 'Cart detail not found'], 404);
    }

    public function showByUser($userId): JsonResponse
    {
        $cartDetail = $this->cartDetailService->getCartDetailByUser($userId);
        if ($cartDetail) {
            return response()->json(CartDetailResource::collection($cartDetail), 200);
        }
        return response()->json(['message' => 'Cart detail not found'], 404);
    }

    public function store(CartDetailRequest $request): JsonResponse
    {
        $cartDetail = $this->cartDetailService->createCartDetail(CartDetailDTO::fromRequest($request));
        return response()->json(new CartDetailResource($cartDetail), 201);
    }

    public function update(CartDetailRequest $request, $id): JsonResponse
    {
        $updated = $this->cartDetailService->updateCartDetail($id, CartDetailDTO::fromRequest($request));
        if ($updated) {
            return response()->json(['message' => 'Cart detail updated successfully']);
        }
        return response()->json(['message' => 'Cart detail not found or not updated'], 404);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->cartDetailService->deleteCartDetail($id);
        if ($deleted) {
            return response()->json(['message' => 'Cart detail deleted successfully']);
        }
        return response()->json(['message' => 'Cart detail not found'], 404);
    }
}
