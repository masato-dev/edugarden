<?php
use App\Http\Controllers\Ajax\Book\BookController;
use App\Http\Controllers\Ajax\Cart\CartController;
use App\Http\Controllers\Ajax\Church\ChurchController;
use App\Http\Controllers\Ajax\Common\AutocompleteController;
use App\Http\Controllers\Ajax\Location\ProvinceController;
use App\Http\Middleware\VerifyUserLoggedIn;
use Illuminate\Support\Facades\Route;

Route::prefix('/ajax')->name('ajax.')->group(function () {

    Route::controller(AutocompleteController::class)
        ->name('autocomplete')
        ->group(function () {
            Route::get('/', 'index')->name('.index');
        });
        
    Route::controller(ChurchController::class)->prefix('/churchs')->name('churchs.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(BookController::class)->prefix('/books')->name('books.')->group(function () {
        Route::get('/search', 'search')->name('search');
    });

    Route::controller(CartController::class)
        ->middleware(VerifyUserLoggedIn::class)
        ->prefix('/carts')
        ->name('carts.')
        ->group(function () {
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
            Route::get('/amount', 'amount')->name('amount');
        });
    
    Route::controller(ProvinceController::class)
        ->prefix('/provinces')
        ->name('provinces.')
        ->group(function () {
            Route::get('/cities', 'cities')->name('cities');
            Route::get('/districts', 'districts')->name('districts');
            Route::get('/wards', 'wards')->name('wards');
        });
});