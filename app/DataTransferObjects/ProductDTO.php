<?php

namespace App\DataTransferObjects;

use App\Http\Requests\Api\ProductRequest;

class ProductDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly float $price,
        public readonly int $quantity,
        public readonly string $photo_url,
        public readonly ?string $isbn,
        public readonly ?string $file_format,
        public readonly ?int $duration,
        public readonly string $type,
        public readonly int $category_id,
        public readonly array $author_ids,

    ) {
    }
    public static function fromRequest(ProductRequest $request): self
    {
        return new self(
            title: $request['title'],
            description: $request['description'],
            price: $request['price'],
            quantity: $request['quantity'],
            photo_url: $request['photoURL'],
            isbn: $request['isbn'],
            file_format: $request['file_format'],
            duration: $request['duration'],
            type: $request['type'],
            category_id: $request['category_id'],
            author_ids: $request['author_ids'],
        );
    }
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'photo_url' => $this->photo_url,
            'isbn' => $this->isbn,
            'file_format' => $this->file_format,
            'duration' => $this->duration,
            'type' => $this->type,
            'category_id' => $this->category_id,
            'author_ids' => json_encode($this->author_ids),
        ];
    }
}