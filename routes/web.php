<?php

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

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');

    Route::get('post/{article:id}', 'show')->name('home.show');

});

Route::post('comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except('show');

    Route::resource('articles', \App\Http\Controllers\ArticleController::class);
});
