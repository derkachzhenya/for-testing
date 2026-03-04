<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        // paginate
        User::paginate(15);

        // simplePaginate
        User::simplePaginate(15);

        // cursorPaginate
        User::orderBy('id')->cursorPaginate(15);
    }
}
