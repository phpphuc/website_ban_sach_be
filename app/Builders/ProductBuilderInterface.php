<?php

namespace App\Builders;

use App\Models\Product;

interface ProductBuilderInterface
{
    public function title(string $title): self;
    public function description(string $description): self;
    public function price(float $price): self;
    public function quantity(int $quantity): self;
    public function photo_url(string $photoUrl): self;
    public function type(string $type): self;
    public function category_id(int $categoryId): self;
    public function author_ids(array $authorIds): self;
    public function build(): Product;
}
