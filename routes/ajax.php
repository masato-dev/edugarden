<?php
use App\Http\Controllers\Ajax\Blog\BlogController;
use App\Http\Controllers\Ajax\Book\BookController;
use App\Http\Controllers\Ajax\Cart\CartController;
use App\Http\Controllers\Ajax\Church\ChurchController;
use App\Http\Controllers\Ajax\Common\AutocompleteController;
use App\Http\Controllers\Ajax\Common\ComponentController;
use App\Http\Controllers\Ajax\Donate\DonateController;
use App\Http\Controllers\Ajax\Location\ProvinceController;
use App\Http\Controllers\Ajax\Payment\VietQRPaymentController;
use App\Http\Controllers\Ajax\UserAddress\UserAddressController;
use App\Http\Middleware\VerifyEmailVerified;
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
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
    });

    Route::controller(CartController::class)
        ->middleware(VerifyUserLoggedIn::class)
        ->middleware(VerifyEmailVerified::class)
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

    Route::controller(UserAddressController::class)
        ->middleware(VerifyUserLoggedIn::class)
        ->middleware(VerifyEmailVerified::class)
        ->prefix('/user-addresses')
        ->name('user-addresses.')
        ->group(function () {
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });

    Route::controller(BlogController::class)
        ->prefix('/blogs')
        ->name('blogs.')
        ->group(function () {
            Route::get('/index', 'index')->name('index');
        });
    
    Route::controller(ComponentController::class)
        ->prefix('/components')
        ->name('components.')
        ->group(function () {
            Route::post('/load', 'load')->name('load');
            Route::post('/load-many', 'loadMany')->name('load-many');   
        });

    Route::controller(DonateController::class)
        ->prefix('/donates')
        ->name('donates.')
        ->group(function () {
            Route::post('/', 'store')->name('store');
        });

    Route::controller(VietQRPaymentController::class)
        ->prefix('/payment/vietqr')
        ->name('payment.vietqr.')
        ->group(function () {
            Route::get('/qr-code', 'qrCode')->name('qr-code');
        });
});