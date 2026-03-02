<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        // Bad: N+1 problem
        $users = User::all();
        foreach ($users as $user) {
            echo $user->posts->count(); // 1 query per user!
        }

        // Good: eager loading
        $users = User::with('posts')->get();
        foreach ($users as $user) {
            echo $user->posts->count(); // only 2 queries total
        }
    }
}