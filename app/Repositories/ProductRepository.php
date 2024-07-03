<?php

namespace App\Repositories;

use App\Factories\ProductFactory;
use App\Models\Product;
use Illuminate\Support\Collection;
use App\DataTransferObjects\ProductDTO;
use App\Factories\ProductFactoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
// use App\Factories\ElectronicBookProductBuilderFactory;
// use App\Factories\AudioBookProductBuilderFactory;
// use App\Factories\BookProductBuilderFactory;

class ProductRepository extends ProductFactory implements ProductRepositoryInterface
{
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function createProduct(ProductDTO $productDTO): Product
    {
        $productFactory = new ProductFactory();
        $product = $productFactory->createModel($productDTO);
        $product->save();
        $product->authors()->attach($productDTO->author_ids);
        return $product;
    }

    public function updateProduct(int $id, ProductDTO $productDTO): bool
    {
        $product = Product::find($id);
        return $product ? $product->update($productDTO->toArray()) : false;
    }

    public function deleteProduct(int $id): bool
    {
        return Product::destroy($id) > 0;
    }

    public function getProductsByCategory($categoryId, $page): Collection
    {
        $perPage = 12;
        $offset = ($page - 1) * $perPage;
        return Product::where('category_id', $categoryId)
            ->skip($offset)
            ->take($perPage)
            ->get();
    }

    public function countProductsByCategory(int $categoryId): int
    {
        return Product::where('category_id', $categoryId)->count();
    }

    public function getProductsByAuthor(int $authorId): Collection
    {
        return Product::whereJsonContains('author_ids', $authorId)->get();
    }

    public function getLatestProducts(int $n): Collection
    {
        return Product::orderBy('created_at', 'desc')->take($n)->get();
    }
}
