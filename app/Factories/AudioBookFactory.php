<?php

namespace App\Factories;

use App\Models\Product;
use App\DataTransferObjects\ProductDTO;
use App\Builders\AudioBookProductBuilder;

class AudioBookFactory implements ProductFactoryInterface
{
    public function createProduct(ProductDTO $productDTO): Product
    {
        $builder = new AudioBookProductBuilder();
        $builder = $builder
            ->title($productDTO->title)
            ->price($productDTO->price)
            ->quantity($productDTO->quantity)
            ->photo_url($productDTO->photo_url)
            ->description($productDTO->description)
            ->type($productDTO->type)
            ->category_id($productDTO->category_id)
            ->author_ids($productDTO->author_ids)
            ->duration($productDTO->duration);
        return $builder->build();
    }
}
