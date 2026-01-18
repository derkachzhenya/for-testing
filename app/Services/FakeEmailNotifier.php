<?php

namespace App\Services;

use App\Contracts\Notifier;

class FakeEmailNotifier implements Notifier
{
    public function send(string $to, string $message): void
    {
        
        logger()->info("FAKE EMAIL notifier: to={$to}, message={$message}");
    }
}
