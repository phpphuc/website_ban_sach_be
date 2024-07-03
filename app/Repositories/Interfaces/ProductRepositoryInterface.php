<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Support\Collection;
use App\DataTransferObjects\ProductDTO;

interface ProductRepositoryInterface
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