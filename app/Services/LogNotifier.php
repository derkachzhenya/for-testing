<?php

namespace App\Services;

use App\Contracts\Notifier;

class LogNotifier implements Notifier
{
    public function send(string $to, string $message): void
    {
        logger()->info("LOG notifier: {$message}");
    }
}
