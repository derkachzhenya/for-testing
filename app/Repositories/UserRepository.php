<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getVerifiedUsers()
    {
        $query = User::query()
            ->where('status', 'active')
            ->where('country', 'USA')
            ->where('is_verified', true)
            ->latest();

        $query->ddRawSql();

        return $query->get();
    }
}











