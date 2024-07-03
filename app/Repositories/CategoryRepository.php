<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\DataTransferObjects\CategoryDTO;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getAllCategories(): Collection
    {
        return $this->model->all();
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->model->find($id);
    }

    public function create(CategoryDTO $categoryDTO): Category
    {
        return $this->model->create($categoryDTO->toArray());
    }

    public function update(int $id, CategoryDTO $categoryDTO): bool
    {
        $category = $this->model->find($id);
        return $category ? $category->update($categoryDTO->toArray()) : false;
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id) > 0;
    }
}
