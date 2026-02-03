<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/(category)', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/(category)/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/(category)', [CategoryController::class, 'put'])->category('category.put');
Route::delete('/category/(category)', [CategoryController::class, 'delete'])->name('category.delete');
