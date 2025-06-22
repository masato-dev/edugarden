<?php

use App\Http\Controllers\Client\Account\AccountController;
use App\Http\Controllers\Client\Account\AuthController;
use App\Http\Controllers\Client\Account\VerificationController;
use App\Http\Controllers\Client\Blog\BlogController;
use App\Http\Controllers\Client\Book\BookController;
use App\Http\Controllers\Client\Cart\CartController;
use App\Http\Controllers\Client\Contact\ContactController;
use App\Http\Controllers\Client\Donate\DonateController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\Order\OrderController;
use App\Http\Controllers\Client\Page\PageController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Middleware\VerifyEmailVerified;
use App\Http\Middleware\VerifyUserLoggedIn;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/ajax.php';

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(ContactController::class)
    ->prefix('/contact')
    ->name('contact.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/send', 'send')->name('send');
    });

Route::controller(DonateController::class)
    ->prefix('/donate')
    ->name('donate.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::controller(AuthController::class)
    ->prefix('/auth/client')
    ->name('auth.client.')
    ->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
        Route::post('/reset-password', 'resetPassword')->name('reset-password');
        Route::post('/forgot-password', 'forgotPassword')->name('forgot-password');
        Route::match(['get', 'post'], '/logout', 'logout')->name('logout');
    });

Route::controller(VerificationController::class)
    ->prefix('/verification')
    ->name('verification.')
    ->group(function () {
        Route::post('/send', 'sendEmailVerification')->name('send');
        Route::get('/verify', 'verify')->name('verify');
    });

Route::controller(BookController::class)
    ->prefix('/books')
    ->name('books.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/search', 'search')->name('search');
        Route::get('/{slug}', 'detail')->name('detail');
    });

Route::controller(CartController::class)
    ->middleware(VerifyUserLoggedIn::class)
    ->prefix('/carts')
    ->name('carts.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

Route::controller(OrderController::class)
    ->middleware(VerifyUserLoggedIn::class)
    ->prefix('/orders')
    ->name('orders.')
    ->group(function () {
        Route::post('/process', 'process')->name('process');
        Route::post('/pay', 'pay')->name('pay');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::get('/', 'index')->name('index');
    });

Route::controller(PaymentController::class)
    ->middleware(VerifyUserLoggedIn::class)
    ->prefix('/payments')
    ->name('payments.')
    ->group(function () {
        Route::get('/result', 'result')->name('result');
    });

Route::controller(AccountController::class)
    ->middleware(VerifyUserLoggedIn::class)
    ->prefix('/account')
    ->name('account.')
    ->group(function () {
        Route::get('/', 'index')->name('index')->middleware(VerifyEmailVerified::class);
        Route::put('/update', 'update')->name('update')->middleware(VerifyEmailVerified::class);
        Route::get('/verify', 'verify')->name('verify');
    });

Route::controller(BlogController::class)
    ->prefix('/blogs')
    ->name('blogs.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'detail')->name('detail');
    });

Route::controller(PageController::class)
    ->name('pages.')
    ->prefix('/')
    ->group(function () {
        Route::get('/{slug}', 'detail')->name('detail');
    });