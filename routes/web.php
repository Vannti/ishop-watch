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

Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/main', 'MainController@index')->name('main');

Route::get('/currency/{curr}', 'CurrencyController@change');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/product/{alias}', 'ProductController@show')->name('product.show');

Route::get('/products?brand={brand}', 'ProductController@index')->name('products.brand');

Route::get('/products?category={category}', 'ProductController@index')->name('products.category');

Route::get('/cart/add', 'CartController@addProduct')->name('cart.addProduct');

Route::get('/cart/show', 'CartController@show')->name('cart.show');

Route::get('/cart/delete', 'CartController@delete')->name('cart.delete');

Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');

Route::get('/search/typeahead', 'SearchController@typeahead')->name('search.typeahead');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/order/add', 'OrderController@add')->name('order.add');

Route::get('/orders', 'OrderController@index')->name('orders');

Route::post('/order/make/', 'OrderController@makeOrder')->name('order.makeOrder');