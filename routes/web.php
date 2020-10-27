<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'index'])->name('home');

Route::prefix('posts')->group(function() {
    Route::post('/', [PostsController::class, 'store']);
    Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
    Route::get('/{id}', [PostsController::class, 'show'])->name('post');
    Route::get('/{id}/edit', [PostsController::class, 'edit'])->name('post.edit');
    Route::put('/{id}', [PostsController::class, 'update']);
});

Route::prefix('users')->group(function() {
    Route::get('/login', [UsersController::class, 'login'])->name('users.login');
    Route::get('/', [UsersController::class, 'index'])->name('users.index');
    Route::post('/', [UsersController::class, 'store']);
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/{id}', [UsersController::class, 'show'])->name('user');
});
