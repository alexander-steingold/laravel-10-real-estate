<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function index()
    {
        $products = Product::with('company')
            ->with('images')
            ->latest()
            ->limit(10)
            ->get();
        return $products;
    }
}
