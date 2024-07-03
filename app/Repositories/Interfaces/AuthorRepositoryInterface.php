<?php

namespace App\Repositories\Interfaces;

use App\Models\Author;
use Illuminate\Support\Collection;
use App\DataTransferObjects\AuthorDTO;

interface AuthorRepositoryInterface
{
    public function getAllAuthors(): Collection;

    public function getAuthorById(int $id): ?Author;

    public function create(AuthorDTO $authorDTO): Author;

    public function update(int $id, AuthorDTO $authorDTO): bool;

    public function delete(int $id): bool;
}
