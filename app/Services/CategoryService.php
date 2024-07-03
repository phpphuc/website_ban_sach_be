<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\DataTransferObjects\CategoryDTO;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function createCategory(CategoryDTO $categoryDTO): Category
    {
        return $this->categoryRepository->create($categoryDTO);
    }

    public function updateCategory(int $id, CategoryDTO $categoryDTO): bool
    {
        return $this->categoryRepository->update($id, $categoryDTO);
    }

    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepository->delete($id);
    }
}
