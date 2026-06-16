<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalProviderService
{
    public function getProviderStatus(): string
    {
        return rescue(
            fn () => Http::get('provider/status')
                ->throw()
                ->json('status'),
            'unavailable'
        );
    }
}

















