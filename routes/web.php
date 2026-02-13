<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'home.index')->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');