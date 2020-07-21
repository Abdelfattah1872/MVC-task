<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
#################### only Register user ####################################
Route::group(['middleware'=>'auth'], function () {
    Route::get('/','PostController@index');
    Route::get('/home','PostController@index');
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController');
});

