<?php

use App\Http\Controllers\Client\Account\AuthController;
use App\Http\Controllers\Client\Book\BookController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/ajax.php';

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(AuthController::class)->prefix('/auth/client')->name('auth.client.')->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::match(['get', 'post'], '/logout', 'logout')->name('logout');
});

Route::controller(BookController::class)->prefix('/books')->name('books.')->group(function () {
    Route::get('/{slug}', 'detail')->name('detail');
});
