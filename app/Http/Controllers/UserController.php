<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        // debugging...
        dd($user); // forgot to remove 

        return view('user.show', compact('user'));
    }
}
