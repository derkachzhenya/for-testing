<?php

namespace App\Contracts;

interface Notifier
{
    public function send(string $to, string $message): void;
}