<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeshGradientController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mesh', MeshGradientController::class);



