<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\ProductDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\Api\ProductResource;
use App\Models\Product;
use App\Services\Interfaces\ProductServiceInterface;

class ProductController extends Controller
{
  public function __construct(protected ProductServiceInterface $productService)
  {
  }
  public function index(): JsonResponse
  {
    return response()->json(ProductResource::collection($this->productService->getAllProducts()), 200);
  }

  public function show($id): JsonResponse
  {
    $product = $this->productService->getProductById($id);
    if ($product) {
      return response()->json(ProductResource::make($product), 200);
    }
    return response()->json(['message' => 'Product not found'], 404);
  }

  public function store(ProductRequest $request): JsonResponse
  {
    $product = $this->productService->createProduct(ProductDTO::fromRequest($request));
    return response()->json($product, 201);
  }

  public function update(ProductRequest $request, $id): JsonResponse
  {
    $updated = $this->productService->updateProduct($id, ProductDTO::fromRequest($request));
    if ($updated) {
      return response()->json(['message' => 'Product updated successfully']);
    }
    return response()->json(['message' => 'Product not found or not updated'], 404);
  }

  public function destroy($id): JsonResponse
  {
    $deleted = $this->productService->deleteProduct($id);
    if ($deleted) {
      return response()->json(['message' => 'Product deleted successfully']);
    }
    return response()->json(['message' => 'Product not found'], 404);
  }

  public function getByCategory($categoryId, $page): JsonResponse
  {
    $products = $this->productService->getProductsByCategory($categoryId, $page);
    return response()->json(ProductResource::collection($products), 200);
  }

  public function countByCategory($categoryId): JsonResponse
  {
    $count = $this->productService->countProductsByCategory($categoryId);
    return response()->json(['count' => $count], 200);
  }

  public function getByAuthor($authorId): JsonResponse
  {
    $products = $this->productService->getProductsByAuthor($authorId);
    return response()->json(ProductResource::collection($products), 200);
  }

  public function getLatest($n): JsonResponse
  {
    $products = $this->productService->getLatestProducts($n);
    return response()->json(ProductResource::collection($products), 200);
  }
}
