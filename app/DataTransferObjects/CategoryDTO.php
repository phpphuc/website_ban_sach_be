<?php

namespace App\DataTransferObjects;

use App\Http\Requests\Api\CategoryRequest;

class CategoryDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title
    ) {
    }
    public static function fromRequest(CategoryRequest $request): self
    {
        return new self(
            title: $request->input('title')
        );
    }
    public function toArray(): array
    {
        return [
            'title' => $this->title
        ];
    }
}