<?php

use App\Http\Controllers\LikesController;
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
Route::post('/', [PostsController::class, 'search']);

Route::prefix('posts')->group(function() {
    Route::post('/', [PostsController::class, 'store']);
    Route::get('/create', [PostsController::class, 'create'])->name('posts.create')->middleware('auth');
    Route::get('/{id}/edit', [PostsController::class, 'edit'])->name('post.edit')->middleware('auth');
    Route::get('/{id}', [PostsController::class, 'show'])->name('post');
    Route::put('/{id}', [PostsController::class, 'update']);
    Route::post('/{id}', [LikesController::class, 'store']);
});

Route::prefix('users')->group(function() {
    Route::get('/login', [UsersController::class, 'login'])->name('users.login');
    Route::post('/login', [UsersController::class, 'authenticate']);
    Route::get('/logout', [UsersController::class, 'logout']);

    Route::get('/', [UsersController::class, 'index'])->name('users.index')->middleware('auth');
    Route::post('/', [UsersController::class, 'store']);
    Route::get('/create', [UsersController::class, 'create'])->name('users.create');
    Route::get('/{id}', [UsersController::class, 'show'])->name('user')->middleware('auth');
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::put('/{id}', [UsersController::class, 'update']);
    Route::post('/{id}', [UsersController::class, 'activePost'])->name('users.activePost');
});

Route::get('/passwordError', function (){
    return view('users.passwordError');
})->name('passwordError');
