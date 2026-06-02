<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function getActiveUsers(): Collection
    {
        return User::query()
            ->whereNotNull('email_verified_at')
            ->latest()
            ->get();
    }
}
