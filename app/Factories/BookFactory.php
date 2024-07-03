<?php

namespace App\Factories;

use App\Models\Product;
use App\Builders\BookProductBuilder;
use App\DataTransferObjects\ProductDTO;

class BookFactory implements ProductFactoryInterface
{
    public function createProduct(ProductDTO $productDTO): Product
    {
        $builder = new BookProductBuilder();
        $builder = $builder
            ->isbn($productDTO->isbn)
            ->title($productDTO->title)
            ->price($productDTO->price)
            ->quantity($productDTO->quantity)
            ->photo_url($productDTO->photo_url)
            ->description($productDTO->description)
            ->type($productDTO->type)
            ->category_id($productDTO->category_id)
            ->author_ids($productDTO->author_ids);
        return $builder->build();
    }
}
