<?php

namespace App\DataTransferObjects;

use App\Http\Requests\Api\AuthorRequest;

class AuthorDTO implements ModelDTO
{
  public function __construct(
    public readonly string $name,
    public readonly string $photo_url
  ) {
  }
  public static function fromRequest(AuthorRequest $request): self
  {
    return new self(
      name: $request->input('name'),
      photo_url: $request->input('photo_url')
    );
  }

  public function toArray(): array
  {
    return [
      'name' => $this->name,
      'photo_url' => $this->photo_url,
    ];
  }
}
