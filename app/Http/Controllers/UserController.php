<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        // returns the first record or null
        $user = User::first();

        // throws ModelNotFoundException if no record exists
        $user = User::firstOrFail();

        // ensures exactly one record exists
        $user = User::sole();
    }
}
