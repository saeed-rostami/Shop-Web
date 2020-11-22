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

Route::get('/search', function (){
    return view('search');
});

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

    Route::post('/buy', "OrderController@buy")->name('buy');
    Route::get('/checkout/{transactionId}/{amount}','OrderController@zarinpalCallback1')->name('checkout');

//    user-profile
    Route::get('/profile', "UserController@profile")->name('Profile');
    Route::get('/edit-profile', "UserController@editProfile")->name('Edit-Profile');
    Route::put('/edit-profile', "UserController@storeProfile")->name('Store-Profile');

});

//admin*****
Route::group(['middleware' => 'admin', 'prefix' => 'admin' , 'namespace' => 'Admin'], function () {

    Route::get('/dashboard', 'AdminController@adminPanel')->name('Admin-Panel');

//    index
    Route::get('/categories', 'CategoriesController@categories')->name('Admin-Categories');
    Route::get('/posts', 'PostsController@posts')->name('Admin-Posts');
    Route::get('/products', 'ProductsController@products')->name('Admin-Products');
    Route::get('/tags', 'TagController@index')->name('Admin-Tags');
    Route::get('/trainers', 'TrainersController@index')->name('Admin-Trainer');

//    store
    Route::post('/store-category', 'CategoriesController@storeCategory')->name('storeCategory');
    Route::post('/store-post', 'PostsController@storePost')->name('storePost');
    Route::post('/store-product', 'ProductsController@storeProduct')->name('storeProduct');
    Route::post('/store-tag', 'TagController@storeTag')->name('storeTag');
    Route::post('/store-trainer', 'TrainersController@storeTrainer')->name('storeTrainer');

//update***
//    category-update
    Route::get('/edit/category/{category}', 'CategoriesController@edit')->name('edit-category');
    Route::put('/update-category/{category}', 'CategoriesController@update')->name('Update-Category');

    //    post-update
    Route::get('/edit/post/{post}', 'PostsController@edit')->name('edit-post');
    Route::put('/update-post/{post}', 'PostsController@update')->name('Update-Post');


//   product-update
    Route::get('/edit/product/{product:title}', 'ProductsController@edit')->name('edit-product');
    Route::put('/update-product/{product}', 'ProductsController@update')->name('Update-Product');


// Tag-update
    Route::get('/edit/tag/{tag:name}', 'TagController@edit')->name('edit-Tag');
    Route::put('/update-tag/{tag:name}', 'TagController@update')->name('Update-Tag');

    // trainer-update
    Route::get('/edit/trainer/{trainer:name}', 'TrainersController@edit')->name('edit-Trainer');
    Route::put('/update-trainer/{trainer:name}', 'TrainersController@update')->name('Update-Trainer');


//    delete
    Route::delete('/delete-category/{category:title}', 'CategoriesController@deleteCategory')->name('Delete-Category');
    Route::delete('/delete-post/{post:title}', 'PostsController@deletePost')->name('Delete-Post');
    Route::delete('/delete-product/{product:title}', 'ProductsController@deleteProduct')->name('Delete-Product');
    Route::delete('/delete-tag/{tag:name}', 'TagController@deleteTag')->name('Delete-Tag');
    Route::delete('/delete-trainer/{trainer:name}', 'TrainersController@deleteTrainer')->name('Delete-Trainer');
});


//*************
//trainers
Route::get('/trainers', 'TrainersController@index')->name('Trainers');
Route::get('/trainers/{trainer:name}', 'TrainersController@show')->name('Trainer-Show');


Route::get('/{category:title}', 'PostController@index')->name('Category');
Route::get('/{category:title}/posts', 'PostController@fetch_data');

Route::get('/{category:title}/{post:title}', 'ProductController@index')->name('Posts');
Route::get('/{category:title}/{post:title}/products', 'ProductController@fetch_data');

Route::get('/{category:title}/{post:title}/{product:slug}', 'ProductController@show')->name('Product');









