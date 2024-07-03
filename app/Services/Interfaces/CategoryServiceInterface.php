<?php

namespace App\Services\Interfaces;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\DataTransferObjects\CategoryDTO;

interface CategoryServiceInterface
{
    public function getAllCategories(): Collection;

    public function getCategoryById(int $id): ?Category;

    public function createCategory(CategoryDTO $categoryDTO): Category;

    public function updateCategory(int $id, CategoryDTO $categoryDTO): bool;

    public function deleteCategory(int $id): bool;
}
