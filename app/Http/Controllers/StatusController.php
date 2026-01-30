<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role');
        $active = $request->query('active');

        return view('status.index', [
            'role' => $role,
            'active' => $active
        ]);
    }
}
