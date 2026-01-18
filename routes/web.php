<?php

use Illuminate\Support\Facades\Route;
use App\Contracts\Notifier;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/env-test', function () {
    return [
        'env' => env('APP_NAME'),
        'config' => config('app.name'),
    ];
});

Route::get('/notify-test', function (Notifier $notifier) {
    $notifier->send('me@example.com', 'Hello from Service Provider');
    return 'Notification sent. Check the log.';
});

