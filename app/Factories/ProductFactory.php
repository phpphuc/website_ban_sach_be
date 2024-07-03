<?php

namespace App\Factories;

use App\Models\Product;

class ProductFactory implements ModelFactoryInterface{
    public function createModel($productDTO): Product {
        $factory = match ($productDTO->type) {
            'electronic' => new ElectronicBookFactory(),
            'audio' => new AudioBookFactory(),
            'book' => new BookFactory(),
        };

        return $factory->createProduct($productDTO);
    }
}
