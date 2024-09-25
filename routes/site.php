<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckOutController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Middleware\AuthCustomerMiddleware;
use App\Http\Middleware\BlockCustomerMiddleware;
use App\Http\Middleware\GuestCustomerMiddleware;
use App\Http\Controllers\Site\CustomerController;
use App\Http\Controllers\Site\ProductDetailController;
use App\Http\Middleware\Localization;

Route::group(['as' => 'site.', 'middleware' =>[ BlockCustomerMiddleware::class,Localization::class]], function () {

    Route::get('/', [SiteController::class, 'index'])->name('home');
    Route::get('/language/{local}', [SiteController::class, 'language'])->name('language');
    Route::get('/shop', [SiteController::class, 'filter'])->name('shop.filter');
    Route::get('/contact', action: [SiteController::class, 'contact'])->name('contact');
    Route::post('/contact', [SiteController::class, 'sendContact']);

    Route::get('product/{slug}', [ProductDetailController::class, 'index'])->name('product');

    Route::group(['middleware' => GuestCustomerMiddleware::class], function () {
        Route::get('/signin', [SiteController::class, 'signin'])->name('signin');
        Route::get('/signup', [SiteController::class, 'signup'])->name('signup');
        Route::post('/store', [CustomerController::class, 'signup'])->name('create');
        Route::post('/login', [CustomerController::class, 'login'])->name('login');
        Route::post('/verifyemail', [CustomerController::class, 'verifyEmail'])->name('verifyemail');
        Route::get('/setotp', [CustomerController::class, 'setotp'])->name('setotp');


    });
    Route::group(['middleware' => AuthCustomerMiddleware::class], function () {
        Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
        Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
        Route::post('checkout/store', [CheckOutController::class, 'store'])->name('checkout.store');
        Route::group(['as' => 'cart.', 'controller' => CartController::class], function () {
            Route::get('/cart', 'index')->name('index');
            Route::post('/cart/store', 'store')->name('store');
            Route::put('/cart/{id}/incraseQuantity', 'incraseQuantity')->name('incraseQuantity');
            Route::put('/cart/{id}/dicraseQuantity', 'dicraseQuantity')->name('dicraseQuantity');
            Route::delete('/cart/{id}/delete', 'destroy')->name('delete');
            Route::post('/cart/applycobon', 'applycobon')->name('applycobon');
           
        });
    
    });

    
});
