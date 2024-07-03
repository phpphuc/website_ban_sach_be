<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\DataTransferObjects\CategoryDTO;

interface CategoryRepositoryInterface
{
    public function getAllCategories(): Collection;

    public function getCategoryById(int $id): ?Category;

    public function create(CategoryDTO $categoryDTO): Category;

    public function update(int $id, CategoryDTO $categoryDTO): bool;

    public function delete(int $id): bool;
}
