<?php

namespace App\Repositories\Interfaces;

use App\DataTransferObjects\AccountDTO;
use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

interface AccountRepositoryInterface
{
    public function getAll(): Collection;
    public function findById($id): ?Account;
    public function findByUsername($username): ?Account;
    public function create(AccountDTO $accountDTO): Account;
    public function update($id, AccountDTO $accountDTO): bool;
    public function delete($id): bool;
}
