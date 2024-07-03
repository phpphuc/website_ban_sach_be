<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        return response()->json(CategoryResource::collection($this->categoryService->getAllCategories()), 200);
    }

    public function show(int $id): JsonResponse
    {
        $category = $this->categoryService->getCategoryById($id);
        if ($category) {
            return response()->json(CategoryResource::make($category), 200);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->createCategory(CategoryDTO::fromRequest($request));
        return response()->json(new CategoryResource($category), 201);
    }

    public function update(CategoryRequest $request, $id): JsonResponse
    {
        $updated = $this->categoryService->updateCategory($id, CategoryDTO::fromRequest($request));
        if ($updated) {
            return response()->json(['message' => 'Category updated successfully']);
        }
        return response()->json(['message' => 'Category not found or not updated'], 404);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->categoryService->deleteCategory($id);
        if ($deleted) {
            return response()->json(['message' => 'Category deleted successfully']);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }
}
