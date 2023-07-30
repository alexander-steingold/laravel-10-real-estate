<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductService
{
    public function index()
    {
        $filters = request()->only(
            'search',
            'status',
            'type',
            'bedrooms',
            'bathrooms',
            'building',
            'area',
            'price'


        );
        $products = Product::with('company', 'firstImage')
            ->latest()
            ->limit(10)
            ->filter($filters)
            ->active()
            ->get();
        return $products;
    }
}
