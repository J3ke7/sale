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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    Route::resource('category', 'CategoryController', ['except' => 'show']);

    Route::get('category/search', ['as' => 'category.search', 'uses' => 'CategoryController@search']);

    Route::resource('product', 'ProductController', ['except' => 'show']);

    Route::get('product/search', ['as' => 'product.search', 'uses' => 'ProductController@search']);

    Route::resource('user', 'UserController', ['only' => ['index', 'destroy']]);

    Route::get('user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
});

Route::resource('product', 'ProductController', ['only' => ['index', 'show']]);
