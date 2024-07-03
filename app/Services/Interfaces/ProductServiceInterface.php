<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\ProductDTO;
use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    public function getAllProducts(): Collection;
    public function getProductById(int $id): ?Product;
    public function createProduct(ProductDTO $productDTO): Product;
    public function updateProduct(int $id, ProductDTO $productDTO): bool;
    public function deleteProduct(int $id): bool;

    public function getProductsByCategory(int $categoryId, $page): Collection;
    public function countProductsByCategory(int $categoryId): int;
    public function getProductsByAuthor(int $authorId): Collection;
    public function getLatestProducts(int $n): Collection;
}