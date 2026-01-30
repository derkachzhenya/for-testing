<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/gretin', function () {
    return [
        'name' => 'Yevhen',
        'secondname' => 'Derkach',
    ];
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index']);

Route::get('/status', [StatusController::class, 'index']);


Route::redirect('/status', '/', 301);

Route::view('/about', 'about.index', ['name'=>'Talor']);