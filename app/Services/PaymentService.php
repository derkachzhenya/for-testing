<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function charge(array $data): void
    {
        // ❌ Manual retry loop
        $attempts = 0;

        while ($attempts < 3) {
            try {
                Http::post('https://api.example.com/charge', $data);
                break;
            } catch (Exception $e) {
                $attempts++;

                if ($attempts >= 3) {
                    throw $e;
                }

                sleep(1);
            }
        }

        // ✅ Built-in
        Http::retry(3, 1000)
            ->post('https://api.example.com/charge', $data)
            ->throw();
    }
}







