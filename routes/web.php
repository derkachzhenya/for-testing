<?php

use App\Contracts\Notifier;
use App\Http\Controllers\PostController;
use App\Policies\PostPolicy;
use Illuminate\Http\Request;
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

Route::get('/notify-test', function (Notifier $notifier) {
    $notifier->send('me@example.com', 'Hello from Service Provider');
    return 'Notification sent. Check the log.';
});


Route::get('/hello/{name}', fn($name) => "Hello $name")
    ->whereAlpha('name');


Route::get('/dashboard', fn() => 'dashboard')->name('dashboard');
Route::get('/go', fn() => redirect()->route('dashboard'));


Route::get('testing', function () {
    return 'Testing route is working!';
});

Route::get('/json', function () {
    return response()->json(
        [
            'ok' => 'Hello',
            'time' => now()->toDateTimeString()
        ],
    );
});

Route::get('/hey/{name}', function (string $name) {
    return "Hey, $name";
});


Route::get('/hi/{name?}', function (?string $name = null) {
    return $name ? "Hi, $name" : "Hi, guest";
});

Route::get('/user/{id}', function (string $id) {
    return "User id: $id";
})->whereNumber('id');

Route::get('/ip', function (Request $request) {
    return $request->ip();
});


Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::patch('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
});


Route::view('/about', 'about.index')->name('about');

Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
    return "Post $post, comment $comment";
});

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});

Route::get('/users/{name?}', function (?string $name = null) {
    return $name;
});

Route::prefix('admin')->group(function () {
    Route::get('/user', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');

    Route::get('/settings', function () {
        return 'Admin Settings';
    })->name('admin.settings');
});
