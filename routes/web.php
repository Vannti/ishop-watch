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

/*User routes*/

Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/main', 'MainController@index')->name('main');

Route::get('/currency/{curr}', 'CurrencyController@change');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/product/{alias}', 'ProductController@show')->name('product.show');

Route::get('/products?brand={brand}', 'ProductController@index')->name('products.brand');

Route::get('/products?category={category}', 'ProductController@index')->name('products.category');

Route::get('/products/hits', 'ProductController@showHits')->name('products.hits');

Route::post('/product/{alias}/add', 'CommentController@add')->name('comment.add');

Route::get('/cart/add', 'CartController@addProduct')->name('cart.addProduct');

Route::get('/cart/show', 'CartController@show')->name('cart.show');

Route::get('/cart/delete', 'CartController@delete')->name('cart.delete');

Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');

Route::get('/search/typeahead', 'SearchController@typeahead')->name('search.typeahead');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/order/add', 'OrderController@add')->name('order.add');

Route::get('/orders', 'OrderController@index')->name('orders');

Route::post('/order/make', 'OrderController@makeOrder')->name('order.makeOrder');

Route::get('/order/delete/{id}', 'OrderController@delete')->name('order.delete');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::post('/contact/add', 'ContactController@add')->name('contact.add');

/*User routes*/


/*Admin routes*/

Route::get('/admin', 'Admin\MainController@index')->name('admin.main');

/*Category*/
Route::get('/admin/categories', 'Admin\CategoryController@index')->name('admin.categories');

Route::post('/admin/categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');

Route::get('/admin/categories/edit/{id}', 'Admin\CategoryController@edit')->name('admin.categories.edit');

Route::post('/admin/categories/update/{id}', 'Admin\CategoryController@update')->name('admin.categories.update');

Route::post('/admin/categories/delete/{id}', 'Admin\CategoryController@delete')->name('admin.categories.delete');
/*Category*/

/*Brands*/
Route::get('/admin/brands', 'Admin\BrandController@index')->name('admin.brands');

Route::get('/admin/brands/create', 'Admin\BrandController@create')->name('admin.brands.create');

Route::get('/admin/brands/edit/{id}', 'Admin\BrandController@edit')->name('admin.brands.edit');

Route::get('/admin/brands/update/{id}', 'Admin\BrandController@update')->name('admin.brands.update');

Route::get('/admin/brands/delete/{id}', 'Admin\BrandController@delete')->name('admin.brands.delete');
/*Brands*/

/*Currencies*/
Route::get('/admin/currencies', 'Admin\CurrencyController@index')->name('admin.currencies');

Route::get('/admin/currencies/create', 'Admin\CurrencyController@create')->name('admin.currencies.create');

Route::get('/admin/currencies/edit/{id}', 'Admin\CurrencyController@edit')->name('admin.currencies.edit');

Route::get('/admin/currencies/update/{id}', 'Admin\CurrencyController@update')->name('admin.currencies.update');

Route::get('/admin/currencies/delete/{id}', 'Admin\CurrencyController@delete')->name('admin.currencies.delete');
/*Currencies*/

/*Products*/
Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products');

Route::get('/admin/products/create', 'Admin\ProductController@index')->name('admin.products.create');

Route::get('/admin/products/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');

Route::get('/admin/products/update/{id}', 'Admin\ProductController@update')->name('admin.products.update');

Route::get('/admin/products/delete/{id}', 'Admin\ProductController@delete')->name('admin.products.delete');

Route::get('/admin/products?category=', 'Admin\ProductController@index')->name('admin.products.category');

Route::get('/admin/products?brand=', 'Admin\ProductController@index')->name('admin.products.brand');
/*Products*/


Route::get('/admin/orders', 'Admin\OrderController@index')->name('admin.orders');

Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users');

/*Admin routes*/