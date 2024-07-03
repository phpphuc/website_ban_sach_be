<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\AuthorDTO;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

interface AuthorServiceInterface
{
  public function getAllAuthors(): Collection;
  public function getAuthorById(int $id): ?Author;
  public function createAuthor(AuthorDTO $authorDTO): Author;
  public function updateAuthor(int $id, AuthorDTO $authorDTO): bool;
  public function deleteAuthor(int $id): bool;
}