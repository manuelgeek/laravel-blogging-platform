<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard/{user:username?}',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::controller(\App\Http\Controllers\PostsController::class)->group(function () {
        Route::get('/', 'index')->name('home')->withoutMiddleware(['auth']);
        Route::get('/posts/create', 'create')->name('post.create');
        Route::post('/posts/create', 'store')->name('post.store');
        Route::get('/posts/{post:slug}', 'show')->name('post.show');
    });
});
require __DIR__.'/auth.php';
