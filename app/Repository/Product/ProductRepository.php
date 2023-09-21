<?php

namespace App\Repository\Product;

use App\Repository\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function create($data) {
        dd($data);
    }
}
