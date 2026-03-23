<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        // ❌ Before — mass assignment vulnerability
        $user->update($request->all());

        // ✅ After — explicit fields only
        $user->update($request->only([
            'name',
            'email',
        ]));
    }
}
