<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = collect([
            ['name' => 'Keyboard', 'price' => 99],
            ['name' => 'Monitor', 'price' => 299],
            ['name' => 'Mouse', 'price' => 49],
        ]);

        $sortedProducts = $products->sortBy('price');

        return response()->json($sortedProducts->values());
    }
    
}
















