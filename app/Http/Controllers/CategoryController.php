<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role');
        $active = $request->query('active');

        return view('category.index', [
            'role' => $role,
            'active' => $active,
        ]);

    }
}
