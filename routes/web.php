<?php

use App\Contracts\Notifier;
use App\Http\Controllers\PostController;
use App\Policies\PostPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


