<?php

use App\Http\Controllers\Client\Account\AuthController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});

Route::controller(AuthController::class)->prefix('/auth/client')->name('auth.client.')->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
});

require_once __DIR__.'/ajax.php';