<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use App\DataTransferObjects\ProductDTO;
use App\Services\Interfaces\ProductServiceInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(): Collection
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->getProductById($id);
    }

    public function createProduct(ProductDTO $productDTO): Product
    {
        return $this->productRepository->createProduct($productDTO);
    }

    public function updateProduct(int $id, ProductDTO $productDTO): bool
    {
        return $this->productRepository->updateProduct($id, $productDTO);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->deleteProduct($id);
    }

    public function getProductsByCategory($categoryId, $page): Collection
    {
        return $this->productRepository->getProductsByCategory($categoryId, $page);
    }

    public function countProductsByCategory(int $categoryId): int
    {
        return $this->productRepository->countProductsByCategory($categoryId);
    }

    public function getProductsByAuthor(int $authorId): Collection
    {
        return $this->productRepository->getProductsByAuthor($authorId);
    }

    public function getLatestProducts(int $n): Collection
    {
        return $this->productRepository->getLatestProducts($n);
    }
}