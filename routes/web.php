<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 
    'namespace' => 'Admin', 'as' => 'admin.'], function() {

    Route::resource('category', 'CategoryController', ['except' => 'show']);

    Route::get('category/search', ['as' => 'category.search', 'uses' => 'CategoryController@search']);

    Route::resource('product', 'ProductController', ['except' => 'show']);

    Route::get('product/search', ['as' => 'product.search', 'uses' => 'ProductController@search']);

    Route::resource('user', 'UserController', ['only' => ['index', 'destroy']]);

    Route::resource('order', 'OrderController', ['only' => ['index', 'destroy']]);

    Route::get('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function() {
    Route::resource('cart', 'CartController', ['only' => ['index']]);

    Route::get('addItem/{id}', ['as' => 'cart.addItem', 'uses' => 'CartController@getAddItem']);

    Route::get('deleteItem/{id}', ['as' => 'cart.deleteItem', 'uses' => 'CartController@getDeleteItem']);

    Route::get('addOrder', ['as' => 'order.addOrder', 'uses' => 'OrderController@getAddOrder']);
});

Route::resource('product', 'ProductController', ['only' => ['index', 'show']]);

Auth::routes();

Route::get('/home', 'HomeController@index');
