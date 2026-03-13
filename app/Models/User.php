<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function example(): void
    {
        $email = 'test@example.com';

        // ❌ Bad
        $user = User::where('email', $email)->first();

        if (!$user) {
            abort(404);
        }

        // ✅ Better
        $user = User::where('email', $email)->firstOrFail();
    }
}
