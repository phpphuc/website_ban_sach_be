<?php

namespace App\Repositories;

use App\DataTransferObjects\AccountDTO;
use App\Models\Account;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository implements AccountRepositoryInterface
{
  public function getAll(): Collection
  {
    return Account::all();
  }

  public function findById($id): ?Account
  {
    return Account::find($id);
  }

  public function findByUsername($username): ?Account
  {
    // dump($username);
    // dump(Account::where('username', $username)->first());
    return Account::where('username', $username)->first();
  }

  public function create(AccountDTO $accountDTO): Account
  {
    return Account::create([
      'username' => $accountDTO->username,
      'password' => bcrypt($accountDTO->password),
      'role' => $accountDTO->role,
      'email' => $accountDTO->email,
      'gender' => $accountDTO->gender,
    ]);
  }

  public function update($id, AccountDTO $accountDTO): bool
  {
    $account = Account::find($id);
    if ($account) {
      $account->update([
        'username' => $accountDTO->username,
        'password' => bcrypt($accountDTO->password),
        'role' => $accountDTO->role,
        'email' => $accountDTO->email,
        'gender' => $accountDTO->gender,
      ]);
      return true;
    }
    return false;
  }

  public function delete($id): bool
  {
    $account = Account::find($id);
    if ($account) {
      $account->delete();
      return true;
    }
    return false;
  }
}
