<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,

            'city' => data_get(
                $this->resource,
                'address.city',
                'Unknown'
            ),
        ];
    }
}

























