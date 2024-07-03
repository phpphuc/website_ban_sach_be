<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\AuthorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthorRequest;
use App\Http\Resources\Api\AuthorResource;
use App\Services\Interfaces\AuthorServiceInterface;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorServiceInterface $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index(): JsonResponse
    {
        return response()->json(AuthorResource::collection($this->authorService->getAllAuthors()), 200);
    }

    public function show($id): JsonResponse
    {
        $author = $this->authorService->getAuthorById($id);
        if ($author) {
            return response()->json(AuthorResource::make($author), 200);
        }
        return response()->json(['message' => 'Author not found'], 404);
    }

    public function store(AuthorRequest $request): JsonResponse
    {
        $author = $this->authorService->createAuthor(AuthorDTO::fromRequest($request));
        return response()->json(new AuthorResource($author), 201);
    }

    public function update(AuthorRequest $request, $id): JsonResponse
    {
        $updated = $this->authorService->updateAuthor($id, AuthorDTO::fromRequest($request));
        if ($updated) {
            return response()->json(['message' => 'Author updated successfully']);
        }
        return response()->json(['message' => 'Author not found or not updated'], 404);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->authorService->deleteAuthor($id);
        if ($deleted) {
            return response()->json(['message' => 'Author deleted successfully']);
        }
        return response()->json(['message' => 'Author not found'], 404);
    }
}
