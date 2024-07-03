<?php

namespace App\Factories;

use App\DataTransferObjects\ProductDTO;
use App\Models\Product;

interface ProductFactoryInterface {
    public function createProduct(ProductDTO $productDTO): Product;
}