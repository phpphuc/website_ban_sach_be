<?php

namespace App\Factories;

// use App\Models\Product;
use App\DataTransferObjects\ModelDTO;
use App\DataTransferObjects\ProductDTO;
use Illuminate\Database\Eloquent\Model;

interface ModelFactoryInterface {
    public function createModel(ModelDTO $modelDTO): Model;
}