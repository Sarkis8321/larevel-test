<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\checkAdminUser;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\NewsController;
Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
 
    Route::get('/dashboard', [ChatController::class, 'index'])->name('dashboard');

    Route::get('/cabinets', [CabinetController::class, 'index'])->name('cabinets');
    Route::post('/cabinet/store', [CabinetController::class, 'store'])->name('add-cabinet');
    Route::get('/cabinets/get', [CabinetController::class, 'getCabinets'])->name('get-cabinets');

    Route::get('/about', [NewsController::class, 'index'])->name('about');

    Route::get('/posts', [PostController::class, 'index'])->name('posts')->middleware('role');
    Route::post('/edit-posts-status', [PostController::class, 'editPostStatus'])->name('edit-posts-status')->middleware('role');


    Route::get('/posts-user', [PostController::class, 'postsUserShow'])->name('posts_user_show')->middleware('role-user');
    Route::post('/add-post', [PostController::class, 'addPost'])->name('add-post')->middleware('role-user');


    Route::post('/add-message', [ChatController::class, 'store'])->name('add-message');

    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
});


