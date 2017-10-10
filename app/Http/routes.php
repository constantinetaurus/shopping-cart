<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Checkout
Route::get('/checkout', ['as' => 'cart.checkout','uses' => 'CartController@getCheckout']);
Route::post('/checkout', ['as' => 'cart.checkout','uses' => 'CartController@postCheckout']);

//Shopping Cart
Route::get('/shopping-cart/add-to-cart/{id}', ['as' => 'cart.addToCart','uses' => 'CartController@getAddToCart']);

Route::get('/shopping-cart', ['as' => 'cart.shoppingCart','uses' => 'CartController@getShoppingCart']);

//Authentication
Route::get('/auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

//Registration
Route::get('/auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/auth/register', 'Auth\AuthController@postRegister');

//Products
Route::resource('/products', 'ProductController');

//Shop
Route::get('/shop', ['as' => 'shop.index', 'uses' => 'ShopController@getIndex']);
Route::get('/shop/{slug}', ['as' => 'shop.single', 'uses' => 'ShopController@getSingle'])->where('slug','[\w\d\-\_]+');

//Pages
Route::get('/', ['as' => 'pages.index', 'uses' => 'PagesController@getIndex']);
Route::get('/about', ['as' => 'pages.about', 'uses' => 'PagesController@getAbout']);
Route::get('/contact', ['as' => 'pages.contact', 'uses' => 'PagesController@getContact']);
