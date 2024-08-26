<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'dashboard','as'=>'admin.','middleware'=>'guest'],function (){

    Route::view('/login','login')->name('login');

});
