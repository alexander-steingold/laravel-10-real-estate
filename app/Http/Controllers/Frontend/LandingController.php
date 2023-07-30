<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function __construct(private ProductService $productService)
    {
    }

    public function index()
    {

        $products = $this->productService->index();
        $targets = Product::$target;
        $types = Product::$type;
        //  return $products;
        return view('frontend.landing.index',
            [
                'products' => $products,
                'targets' => $targets,
                'types' => $types
            ]
        );
    }
}
