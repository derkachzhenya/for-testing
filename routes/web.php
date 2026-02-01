<?php


use App\Http\Controllers\UserPostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Ok';
    });
});

Route::get('/post/{post}', function (Post $post) {
    return $post;
});


Route::scopeBindings()->group(function ()
{
    Route::get('/user/{user}/posts/{post}', [UserPostController::class, 'show'])->name('users.posts.show');
});
