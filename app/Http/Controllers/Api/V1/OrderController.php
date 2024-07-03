<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\OrderDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\Api\OrderResource;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(): JsonResponse
    {
        return response()->json(OrderResource::collection($this->orderService->getAllOrders()), 200);
    }

    public function show($id): JsonResponse
    {
        $order = $this->orderService->getOrderById($id);
        if ($order) {
            return response()->json(OrderResource::make($order), 200);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }

    public function showByUser($id): JsonResponse
    {
        $orders = $this->orderService->getOrdersByUserId($id);
        return response()->json(OrderResource::collection($orders), 200);
    }

    public function store(OrderRequest $request): JsonResponse
    {
        $order = $this->orderService->createOrder(OrderDTO::fromRequest($request));
        return response()->json(new OrderResource($order), 201);
    }

    public function update(OrderRequest $request, $id): JsonResponse
    {
        $updated = $this->orderService->updateOrder($id, OrderDTO::fromRequest($request));
        if ($updated) {
            return response()->json(['message' => 'Order updated successfully']);
        }
        return response()->json(['message' => 'Order not found or not updated'], 404);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->orderService->deleteOrder($id);
        if ($deleted) {
            return response()->json(['message' => 'Order deleted successfully']);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }
}
