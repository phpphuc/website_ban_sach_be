<?php

namespace App\DataTransferObjects;

use App\Http\Requests\Api\AccountLoginRequest;
use App\Http\Requests\Api\AccountRegisterRequest;

class AccountDTO implements ModelDTO
{

    public function __construct(
        public readonly string $username,
        public readonly string $password,
        public readonly ?string $role = null,
        public readonly ?string $email = null,
        public readonly ?string $gender = null
    ) {
    }

    public static function fromRegisterRequest(AccountRegisterRequest $request): self
    {
        return new self(
            username: $request->input('username'),
            password: $request->input('password'),
            role: $request->input('role'),
            email: $request->input('email'),
            gender: $request->input('gender')
        );
    }

    public static function fromLoginRequest(AccountLoginRequest $request): self
    {
        return new self(
            username: $request->input('username'),
            password: $request->input('password'),
            role: null,
            email: null,
            gender: null
        );
    }

    public function withHashedPassword(string $hashedPassword): self
    {
        return new self(
            username: $this->username,
            password: $hashedPassword,
            role: $this->role,
            email: $this->email,
            gender: $this->gender
        );
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'role' => $this->role,
            'email' => $this->email,
            'gender' => $this->gender
        ];
    }
}
