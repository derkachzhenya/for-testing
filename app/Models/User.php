<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Mcp\Enums\Role;


class User extends Authenticatable
{

    // Many-to-many relationship
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
} 

