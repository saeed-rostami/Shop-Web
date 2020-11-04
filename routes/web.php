<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/posts', 'PostController@all');

Route::get('/', 'CategoryController@index')->name('Home');
Route::post('/emailCheck', "HomeController@checkEmail")->name('EmailCheck');
Route::post('/phoneCheck', "HomeController@checkPhone")->name('PhoneCheck');


//shop and card
Route::group(['middleware' => 'auth'], function () {

    Route::get('/shoppingcard', 'CardController@CardIndex')->name('CardIndex')->middleware('verified');
    Route::post('/add-to-card', 'CardController@AddProduct')->name('AddProduct');
    Route::delete('/remove-item/{product}', 'CardController@remove')->name('remove');
    Route::delete('/remove-all', 'CardController@removeAll')->name('removeAll');
    Route::get('/profile', "UserController@profile")->name('Profile');
});

//admin*****
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'Admin\AdminController@adminPanel')->name('Admin-Panel');

//    index
    Route::get('/categories', 'Admin\CategoriesController@categories')->name('Admin-Categories');
    Route::get('/posts', 'Admin\PostsController@posts')->name('Admin-Posts');
    Route::get('/products', 'Admin\ProductsController@products')->name('Admin-Products');

//    store
    Route::post('/store-category', 'Admin\CategoriesController@storeCategory')->name('storeCategory');
    Route::post('/store-post', 'Admin\PostsController@storePost')->name('storePost');
    Route::post('/store-product', 'Admin\ProductsController@storeProduct')->name('storeProduct');

//update***
//    category-update
    Route::get('/edit/category/{category}', 'Admin\CategoriesController@edit')->name('edit-category');
    Route::put('/update-category/{category}', 'Admin\CategoriesController@update')->name('Update-Category');

    //    post-update
    Route::get('/edit/post/{post}', 'Admin\PostsController@edit')->name('edit-post');
    Route::put('/update-post/{post}', 'Admin\PostsController@update')->name('Update-Post');


//   product-update
    Route::get('/edit/product/{product}', 'Admin\ProductsController@edit')->name('edit-product');
    Route::put('/update-product/{product}', 'Admin\ProductsController@update')->name('Update-Product');

//    delete
    Route::delete('/delete-category/{category:title}', 'Admin\CategoriesController@deleteCategory')->name('Delete-Category');
    Route::delete('/delete-post/{post:title}', 'Admin\PostsController@deletePost')->name('Delete-Post');
    Route::delete('/delete-product/{product:title}', 'Admin\ProductsController@deleteProduct')->name('Delete-Product');
});


//*************

Route::get('/{category:title}', 'PostController@index')->name('Category');
Route::get('/{category:title}/posts', 'PostController@fetch_data');

Route::get('/{category:title}/{post:title}', 'ProductController@index')->name('Posts');
Route::get('/{category:title}/{post:title}/products', 'ProductController@fetch_data');

Route::get('/{category:title}/{post:title}/{product:slug}', 'ProductController@show')->name('Product');







