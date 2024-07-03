<?php

namespace App\Builders;

use App\Models\Product;

class AudioBookProductBuilder implements ProductBuilderInterface
{
    private Product $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function title(string $title): self {
        $this->product->title = $title;
        return $this;
    }

    public function price(float $price): self {
        $this->product->price = $price;
        return $this;
    }

    public function quantity(int $quantity): self {
        $this->product->quantity = $quantity;
        return $this;
    }

    public function photo_url(string $photo_url): self {
        $this->product->photo_url = $photo_url;
        return $this;
    }

    public function description(string $description): self {
        $this->product->description = $description;
        return $this;
    }

    public function duration(int $duration): self {
        $this->product->duration = $duration;
        return $this;
    }

    public function category_id(int $category_id): self {
        $this->product->category_id = $category_id;
        return $this;
    }

    public function author_ids(array $author_ids): self {
        $this->product->author_ids = $author_ids;
        return $this;
    }

    public function type(string $type): self {
        $this->product->type = $type;
        return $this;
    }

    public function build(): Product {
        return $this->product;
    }
}
