<?php
use App\Http\Controllers\Ajax\Book\BookController;
use App\Http\Controllers\Ajax\Church\ChurchController;
use Illuminate\Support\Facades\Route;

Route::prefix('/ajax')->name('ajax.')->group(function () {
    Route::controller(ChurchController::class)->prefix('/churchs')->name('churchs.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(BookController::class)->prefix('/books')->name('books.')->group(function () {
        Route::get('/search', 'search')->name('search');
    });
});