<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.show');



Route::middleware(['guest'])->group(function() {
    Route::get('/register', [Controllers\Auth\RegisterController::class, 'create'])->name('auth.register');
    Route::post('/register', [Controllers\Auth\RegisterController::class, 'store']);

    Route::get('/login', [Controllers\Auth\LoginController::class, 'create'])->name('auth.login');
    Route::post('/login', [Controllers\Auth\LoginController::class, 'store']);
});

// todo auth middleware:
Route::middleware(['auth'])->group(function() {
    Route::get('/publish', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/publish', [Controllers\PostController::class, 'store']);

    Route::post('/logout', [Controllers\Auth\LoginController::class, 'destroy'])->name('auth.logout');
});

