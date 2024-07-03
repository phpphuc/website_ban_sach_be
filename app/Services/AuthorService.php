<?php

namespace App\Services;

use App\Models\Author;
use App\DataTransferObjects\AuthorDTO;
use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Interfaces\AuthorServiceInterface;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorService implements AuthorServiceInterface
{
    public function __construct(protected AuthorRepositoryInterface $authorRepository)
    {
    }

    public function getAllAuthors(): Collection
    {
        return $this->authorRepository->getAllAuthors();
    }

    public function getAuthorById(int $id): ?Author
    {
        return $this->authorRepository->getAuthorById($id);
    }

    Public function createAuthor(AuthorDTO $authorDTO): Author
    {
        return $this->authorRepository->create($authorDTO);
    }

    public function updateAuthor(int $id, AuthorDTO $authorDTO): bool
    {
        return $this->authorRepository->update($id, $authorDTO);
    }

    public function deleteAuthor(int $id): bool
    {
        return $this->authorRepository->delete($id);
    }

}
