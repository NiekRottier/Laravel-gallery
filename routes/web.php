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

Route::get('/', function ()
{
    $posts = Posts::all()->sortByDesc('created_at');

    return view('index', [
        'posts' => $posts
    ]);
})->name('index');


Route::prefix('posts')->group(function() {
    Route::get('/create', [PostsController::class, 'showCreate'])->name('posts.create');
    Route::get('/{id}', [PostsController::class, 'showPost'])->name('post');
});


Route::name('users.')->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/create', [UsersController::class, 'showCreate'])->name('create');
    });
});
