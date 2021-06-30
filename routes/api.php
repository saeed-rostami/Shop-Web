<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/



Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::post('/auth/logout', "Auth@logout");
    Route::get('/auth/user', "Auth@user");
});

Route::namespace('Api')->group(function () {
    Route::post('/auth/register', "Auth@register");
    Route::post('/auth/login', "Auth@login");

    //EMAIL_VERIFY
    Route::get('/email/resend', "VerificationController@resend");
    Route::get('/email/verify/{id}/{hash}', "VerificationController@verify");
});



//******************
Route::namespace('Api')->group(function () {

//    Route::get('/index', 'CategoryController@index');
//    Route::get('/products', 'ProductController@index');
//    Route::get('/posts', 'PostController@index');


    Route::get('/', 'CategoryController@index');
    Route::get('/{category:title}', 'PostController@index');
    Route::get('/{category}/{post}', 'ProductController@index');
    Route::get('/{category}/{post}/{product}', 'ProductController@show');
});

