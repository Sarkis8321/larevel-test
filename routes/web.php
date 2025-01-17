<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Middleware\checkAdminUser;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/posts', [PostController::class, 'index'])->name('posts')->middleware('role');
});


