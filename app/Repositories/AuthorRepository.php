<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Support\Collection;
use App\DataTransferObjects\AuthorDTO;
use App\Repositories\Interfaces\AuthorRepositoryInterface;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAllAuthors(): Collection
    {
        return Author::all();
    }

    public function getAuthorById(int $id): ?Author
    {
        return Author::find($id);
    }

    public function findByUsername($username)
    {
        return $this->model->where('username', $username)->first();
    }

    public function create(AuthorDTO $authorDTO): Author
    {
        return Author::create($authorDTO->toArray());
    }

    public function update(int $id, AuthorDTO $authorDTO): bool
    {
        return Author::find($id)->update($authorDTO->toArray());
    }

    public function delete(int $id): bool
    {
        return Author::destroy($id);
    }
}