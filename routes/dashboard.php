<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ShipController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CobonController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderItemsController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductSizeColorController;
use App\Http\Controllers\Admin\RoleController;

Route::group(['prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => 'guest'], function () {

    Route::view('/login', 'admin.auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);


});

Route::group(['prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => AdminMiddleware::class], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group([ 'as' => 'category.','controller'=>CategoryController::class], function () {
        Route::get('/category','index')->name('index');
        Route::get('/category/create','create')->name('create');
        Route::post('/category/store','store')->name('store');
        Route::get('/category/{id}/edit','edit')->name('edit');
        Route::put('/category/{id}/update','update')->name('update');
        Route::delete('/category/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'subCategory.','controller'=>SubCategoryController::class], function () {
        Route::get('/subCategory','index')->name('index');
        Route::get('/subCategory/create','create')->name('create');
        Route::post('/subCategory/store','store')->name('store');
        Route::get('/subCategory/{id}/edit', 'edit')->name('edit');
        Route::put('/subCategory/{id}/update','update')->name('update');
        Route::delete('/subCategory/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'brand.','controller'=>BrandController::class], function () {
        Route::get('/brand','index')->name('index');
        Route::get('/brand/create','create')->name('create');
        Route::post('/brand/store','store')->name('store');
        Route::get('/brand/{id}/edit', 'edit')->name('edit');
        Route::put('/brand/{id}/update','update')->name('update');
        Route::delete('/brand/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'color.','controller'=>ColorController::class], function () {
        Route::get('/Color','index')->name('index');
        Route::get('/Color/create','create')->name('create');
        Route::post('/Color/store','store')->name('store');
        Route::get('/Color/{id}/edit', 'edit')->name('edit');
        Route::put('/Color/{id}/update','update')->name('update');
        Route::delete('/Color/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'size.','controller'=>SizeController::class], function () {
        Route::get('/size','index')->name('index');
        Route::get('/size/create','create')->name('create');
        Route::post('/size/store','store')->name('store');
        Route::get('/size/{id}/edit', 'edit')->name('edit');
        Route::put('/size/{id}/update','update')->name('update');
        Route::delete('/size/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'slider.','controller'=>SliderController::class], function () {
        Route::get('/slider','index')->name('index');
        Route::get('/slider/create','create')->name('create');
        Route::post('/slider/store','store')->name('store');
        Route::get('/slider/{id}/edit', 'edit')->name('edit');
        Route::put('/slider/{id}/update','update')->name('update');
        Route::delete('/slider/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'product.','controller'=>ProductController::class], function () {
        Route::get('/product','index')->name('index');
        Route::get('/product/create','create')->name('create');
        Route::post('/product/store','store')->name('store');
        Route::get('/product/{id}/edit', 'edit')->name('edit');
        Route::put('/product/{id}/update','update')->name('update');
        Route::get('/product/{id}/show','show')->name('show');
    });

    Route::group([ 'as' => 'ProductSize.','controller'=>ProductSizeController::class], function () {
        Route::get('/product/{id}/ProductSize/create','create')->name('create');
        Route::post('/ProductSize/store','store')->name('store');
        Route::get('/ProductSize/{id}/edit', 'edit')->name('edit');
        Route::put('/ProductSize/{id}/update','update')->name('update');
        Route::get('/ProductSize/{id}/show','show')->name('show');
    });

    Route::group([ 'as' => 'ProductSizeColor.','controller'=>ProductSizeColorController::class], function () {
        Route::get('/product/{id}/ProductSizeColor/create','create')->name('create');
        Route::post('/ProductSizeColor/store','store')->name('store');
        Route::get('/ProductSizeColor/{id}/edit', 'edit')->name('edit');
        Route::put('/ProductSizeColor/{id}/update','update')->name('update');
        Route::get('/ProductSizeColor/{id}/show','show')->name('show');
    });

    Route::group([ 'as' => 'customer.','controller'=>CustomerController::class], function () {
        Route::get('/customer','index')->name('index');
        Route::get('/customer/{id}/edit','edit')->name('edit');
        Route::put('/customer/{id}/update','update')->name('update');
        Route::put('/customer/{id}/block','block')->name('block');
        Route::put('/customer/{id}/unblock','unblock')->name('unblock');
    });

    Route::group([ 'as' => 'shipping.','controller'=>ShipController::class], function () {
        Route::get('/shipping','index')->name('index');
        Route::get('/shipping/create','create')->name('create');
        Route::post('/shipping/store','store')->name('store');
        Route::get('/shipping/{id}/edit','edit')->name('edit');
        Route::put('/shipping/{id}/update','update')->name('update');
        Route::delete('/shipping/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'cobon.','controller'=>CobonController::class], function () {
        Route::get('/cobon','index')->name('index');
        Route::get('/cobon/create','create')->name('create');
        Route::post('/cobon/store','store')->name('store');
        Route::get('/cobon/{id}/edit','edit')->name('edit');
        Route::put('/cobon/{id}/update','update')->name('update');
        Route::delete('/cobon/{id}/delete','destroy')->name('delete');
    });
    Route::group([ 'as' => 'contact.','controller'=>ContactController::class], function () {
        Route::get('/contact','index')->name('index');
        Route::get('/contact/{id}/show','show')->name('show');
        Route::get('/contact/showreaded','readed')->name('readed');
        Route::delete('/contact/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'order.','controller'=>OrderItemsController::class], function () {
        Route::get('/order','index')->name('index');
        Route::get('/order/create','create')->name('create');
        Route::get('/order/{id}/edit', 'edit')->name('edit');
        Route::put('/order/{order}/update','update')->name('update');
        Route::get('/order/{id}/show','show')->name('show');
    });

    Route::group([ 'as' => 'role.','controller'=>RoleController::class], function () {
        Route::get('/role','index')->name('index');
        Route::get('/role/create','create')->name('create');
        Route::post('/role/store','store')->name('store');
        Route::get('/role/{id}/edit','edit')->name('edit');
        Route::put('/role/{id}/update','update')->name('update');
        Route::delete('/role/{id}/delete','destroy')->name('delete');
    });

    Route::group([ 'as' => 'admin.','controller'=>AdminController::class], function () {
        Route::get('/admin','index')->name('index');
        Route::get('/admin/create','create')->name('create');
        Route::post('/admin/store','store')->name('store');
        Route::get('/admin/{id}/edit','edit')->name('edit');
        Route::put('/admin/{id}/update','update')->name('update');
        Route::delete('/admin/{id}/delete','destroy')->name('delete');
    });
});