<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\AccountDTO;
use App\Http\Requests\Api\AccountRequest;
use App\Http\Resources\Api\AccountResource;
use App\Http\Requests\Api\AccountLoginRequest;
use App\Http\Requests\Api\AccountRegisterRequest;
use App\Services\Interfaces\AccountServiceInterface;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountServiceInterface $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index(): JsonResponse
    {
        return response()->json(AccountResource::collection($this->accountService->getAllAccounts()), 200);
    }

    public function show($id): JsonResponse
    {
        $account = $this->accountService->getAccountById($id);
        if ($account) {
            return response()->json(AccountResource::make($account), 200);
        }
        return response()->json(['message' => 'Account not found'], 404);
    }


  public function register(AccountRegisterRequest $request): JsonResponse
  {
    $account = $this->accountService->register(AccountDTO::fromRegisterRequest($request));
    if ($account) {
      return response()->json(AccountResource::make($account), 200);
    } else {
      return response()->json(['message' => 'Register fail'], 500);
    }
  }

  public function login(AccountLoginRequest $request): JsonResponse
  {
    $account = $this->accountService->login(AccountDTO::fromLoginRequest($request));
    if ($account) {
      return response()->json(AccountResource::make($account), 200);
    } else {
      return response()->json(['message' => 'Login fail'], 500);
    }
  }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->accountService->deleteAccount($id);
        if ($deleted) {
            return response()->json(['message' => 'Account deleted successfully']);
        }
        return response()->json(['message' => 'Account not found'], 404);
    }
}
