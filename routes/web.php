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

 Route::get('/search', 'SearchController@search')->name('Search');



Route::get('/', 'CategoryController@index')->name('Home');
Route::post('/emailCheck', "HomeController@checkEmail")->name('EmailCheck');
Route::post('/phoneCheck', "HomeController@checkPhone")->name('PhoneCheck');


//shop and card
Route::group(['middleware' => ['auth' , 'verify']], function () {

    Route::get('/shoppingcard', 'CardController@CardIndex')->name('CardIndex');
    Route::post('/add-to-card', 'CardController@AddProduct')->name('AddProduct');
    Route::delete('/remove-item/{product}', 'CardController@remove')->name('remove');
    Route::delete('/remove-all', 'CardController@removeAll')->name('removeAll');

    Route::post('/buy', "OrderController@buy")->name('buy');
    Route::get('/callback', 'OrderController@callback')->name('callback');

//    user-profile
    Route::get('/profile', "UserController@profile")->name('Profile');
    Route::get('/edit-profile', "UserController@editProfile")->name('Edit-Profile');
    Route::put('/edit-profile', "UserController@storeProfile")->name('Store-Profile');

//receipt
    Route::get('/receipt', "UserController@receipt")->name('Receipt');


});

//admin*****
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/dashboard', 'AdminController@adminPanel')->name('Admin-Panel');

//    index
    Route::get('/categories', 'CategoriesController@categories')->name('Admin-Categories');
    Route::get('/posts', 'PostsController@posts')->name('Admin-Posts');
    Route::get('/products', 'ProductsController@products')->name('Admin-Products');
    Route::get('/tags', 'TagController@index')->name('Admin-Tags');
    Route::get('/trainers', 'TrainersController@index')->name('Admin-Trainer');
    Route::get('/orders', 'OrdersController@index')->name('Admin-Orders');
    Route::get('/order/{order}', 'OrdersController@order')->name('Admin-Order');
    Route::get('/users', 'UsersController@users')->name('Admin-Users');
    Route::get('/customers', 'CustomersController@index')->name('Admin-Customers');

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

//    order-update
    Route::put('/update-order/{order}', 'OrdersController@changeStatus')->name('Update-Order');


    //    user-update
    Route::get('/update-user/{user}', 'UsersController@edit')->name('Edit-User');
    Route::put('/update-user/{user}', 'UsersController@update')->name('Update-User');

//    delete
    Route::delete('/delete-category/{category:title}', 'CategoriesController@deleteCategory')->name('Delete-Category');
    Route::delete('/delete-post/{post:title}', 'PostsController@deletePost')->name('Delete-Post');
    Route::delete('/delete-product/{product:title}', 'ProductsController@deleteProduct')->name('Delete-Product');
    Route::delete('/delete-tag/{tag:name}', 'TagController@deleteTag')->name('Delete-Tag');
    Route::delete('/delete-trainer/{trainer:name}', 'TrainersController@deleteTrainer')->name('Delete-Trainer');
    Route::delete('/delete-user/{user}', 'UsersController@destroy')->name('Delete-User');
});


//*************
//trainers
Route::get('/trainers', 'TrainersController@index')->name('Trainers');
Route::get('/trainers/{trainer:name}', 'TrainersController@show')->name('Trainer-Show');

// AllProducts
Route::get('/products', 'ProductController@allProducts')->name('AllProducts');


Route::get('/{category:title}', 'PostController@index')->name('Category');
Route::get('/{category:title}/posts', 'PostController@fetch_data');

Route::get('/{category:title}/{post:title}', 'ProductController@index')->name('Posts');
Route::get('/{category:title}/{post:title}/products', 'ProductController@fetch_data');

Route::get('/{category:title}/{post:title}/{product:slug}', 'ProductController@show')->name('Product');









