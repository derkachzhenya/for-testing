<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalProviderService
{
    public function getProviderStatus(): string
{
    return rescue(
        fn () => Http::get('https://api.example.com/provider/status')
            ->throw()
            ->json('status') ?? 'unavailable',
        'unavailable'
    );
}
}

















