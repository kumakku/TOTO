<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/posts',  [PostController::class, 'store'])->name('store');
    Route::get('/posts/create',  [PostController::class, 'create'])->name('create');
    Route::post('/posts/comment',  [PostController::class, 'comment'])->name('comment');
    Route::get('/posts/{post}',  [PostController::class, 'show'])->name('show');
    Route::put('/posts/{post}',  [PostController::class, 'update'])->name('update');
    Route::delete('/posts/{post}',  [PostController::class, 'delete'])->name('delete');
    Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->name('edit');
    Route::get('/users/{user}', [PostController::class, 'user_prof'])->name('user_prof');
    Route::get('/users/{user}/followers', [PostController::class, 'user_all_followers'])->name('user_all_followers');
    Route::get('/users/{user}/followees', [PostController::class, 'user_all_followees'])->name('user_all_followees');
    Route::get('/categories/{category}', [CategoryController::class,'index']);
    Route::get('/like/{id}', [LikeController::class, 'like']);
    Route::get('/unlike/{id}', [LikeController::class, 'unlike']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
