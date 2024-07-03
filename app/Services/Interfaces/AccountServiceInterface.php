<?php

namespace App\Services\Interfaces;

use App\DataTransferObjects\AccountDTO;
use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

interface AccountServiceInterface
{
    public function getAllAccounts(): Collection;
    public function getAccountById($id): ?Account;
    public function register(AccountDTO $accountDTO): Account;
    public function login(AccountDTO $accountDTO): ?Account;
    public function deleteAccount($id): bool;
}
