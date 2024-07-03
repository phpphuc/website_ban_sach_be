<?php

namespace App\Builders;

use App\Models\Product;

class BookProductBuilder implements ProductBuilderInterface
{
    private Product $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function title(string $title): selft {
        $this->product->title = $title
        return $this;
    }

    public function description(string $description): selft {
        $this->product->description = $description;
        return $this;
    }

    public function price(float $price): selft {
        $this->product->price = $price;
        return $this;
    }

    public function category_id(int $categoryId): selft {
        $this->product->categoryId = $categoryId;
        return $this;
    }

    public function quantity(int $quantity): selft {
        $this->product->quantity = $quantity;
        return $this;
    }

    public function photo_url(string $photo_url): selft {
        $this->product->photo_url = $photo_url;
        return $this;
    }

    public function author_ids(array $authorIds): selft {
        $this->product->authorIds = $authorIds;
        return $this;
    }

    public function isbn(string $isbn): self {
        $this->product->isbn = $isbn;
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
