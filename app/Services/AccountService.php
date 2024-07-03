<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use App\DataTransferObjects\AccountDTO;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Interfaces\AccountServiceInterface;
use App\Repositories\Interfaces\AccountRepositoryInterface;

class AccountService implements AccountServiceInterface
{
    protected $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function getAllAccounts(): Collection
    {
        return $this->accountRepository->getAll();
    }

    public function getAccountById($id): ?Account
    {
        return $this->accountRepository->findById($id);
    }

    public function register(AccountDTO $accountDTO): Account
    {
        // $hashedPassword = Hash::make($accountDTO->password);
        $hashedPassword = bcrypt($accountDTO->password);
        $hashedPassword = ($accountDTO->password);
        $accountDTOWithHashedPassword = $accountDTO->withHashedPassword($hashedPassword);
        return $this->accountRepository->create($accountDTOWithHashedPassword);
    }
    public function login(AccountDTO $accountDTO): ?Account
    {
        $account = $this->accountRepository->findByUsername($accountDTO->username);

        if ($account && Hash::check($accountDTO->password, $account->password)) {
            // dump($account);
            return $account;
        }
        return null;
    }

    public function deleteAccount($id): bool
    {
        return $this->accountRepository->delete($id);
    }
}
