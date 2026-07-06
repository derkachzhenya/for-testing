<?php

namespace App\Http\Controllers;


class ProductController extends Controller
{

    public function index()
    {
        $products = collect([
            ['name' => 'Keyboard', 'price' => 99],
            ['name' => 'Monitor', 'price' => 299],
            ['name' => 'Mouse', 'price' => 49],
        ]);

        return $products->sortBy('price')->values();
    }
}

















