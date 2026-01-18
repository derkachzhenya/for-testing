<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/env-test', function () {
    return [
        'env' => env('APP_NAME'),
        'config' => config('app.name'),
    ];
});

