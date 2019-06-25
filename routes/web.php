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

Route::get('/admin/categories/edit/{id}', 'Admin\CategoryController@edit')->name('admin.categories.edit');

Route::post('/admin/categories/create', 'Admin\CategoryController@create')->name('admin.categories.create');

Route::post('/admin/categories/update/{id}', 'Admin\CategoryController@update')->name('admin.categories.update');

Route::post('/admin/categories/delete/{id}', 'Admin\CategoryController@delete')->name('admin.categories.delete');

Route::get('/admin/search/categories', 'Admin\SearchController@categories')->name('admin.search.categories');

Route::get('/admin/search/category', 'Admin\SearchController@category')->name('admin.search.category');
/*Category*/

/*Brands*/
Route::get('/admin/brands', 'Admin\BrandController@index')->name('admin.brands');

Route::post('/admin/brands/create', 'Admin\BrandController@create')->name('admin.brands.create');

Route::get('/admin/brands/edit/{id}', 'Admin\BrandController@edit')->name('admin.brands.edit');

Route::post('/admin/brands/update/{id}', 'Admin\BrandController@update')->name('admin.brands.update');

Route::post('/admin/brands/delete/{id}', 'Admin\BrandController@delete')->name('admin.brands.delete');

Route::get('/admin/search/brands', 'Admin\SearchController@brands')->name('admin.search.brands');

Route::get('/admin/search/brand', 'Admin\SearchController@brand')->name('admin.search.brand');
/*Brands*/

/*Currencies*/
Route::get('/admin/currencies', 'Admin\CurrencyController@index')->name('admin.currencies');

Route::post('/admin/currencies/create', 'Admin\CurrencyController@create')->name('admin.currencies.create');

Route::get('/admin/currencies/edit/{id}', 'Admin\CurrencyController@edit')->name('admin.currencies.edit');

Route::post('/admin/currencies/update/{id}', 'Admin\CurrencyController@update')->name('admin.currencies.update');

Route::post('/admin/currencies/delete/{id}', 'Admin\CurrencyController@delete')->name('admin.currencies.delete');

Route::get('/admin/search/currencies', 'Admin\SearchController@currencies')->name('admin.search.currencies');

Route::get('/admin/search/currency', 'Admin\SearchController@currency')->name('admin.search.currency');
/*Currencies*/

/*Products*/
Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products');

Route::post('/admin/products/create', 'Admin\ProductController@create')->name('admin.products.create');

Route::get('/admin/products/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');

Route::post('/admin/products/update/{id}', 'Admin\ProductController@update')->name('admin.products.update');

Route::post('/admin/products/delete/{id}', 'Admin\ProductController@delete')->name('admin.products.delete');

Route::get('/admin/products?category=', 'Admin\ProductController@index')->name('admin.products.category');

Route::get('/admin/products?brand=', 'Admin\ProductController@index')->name('admin.products.brand');

Route::get('/admin/search/products', 'Admin\SearchController@products')->name('admin.search.products');

Route::get('/admin/search/product', 'Admin\SearchController@product')->name('admin.search.product');
/*Products*/

/*Orders*/
Route::get('/admin/orders', 'Admin\OrderController@index')->name('admin.orders');

Route::get('/admin/orders/user/{id}', 'Admin\OrderController@user')->name('admin.orders.user');

Route::post('/admin/orders/create', 'Admin\OrderController@create')->name('admin.orders.create');

Route::get('/admin/orders/edit/{id}', 'Admin\OrderController@edit')->name('admin.orders.edit');

Route::post('/admin/orders/update/{id}', 'Admin\OrderController@update')->name('admin.orders.update');

Route::post('/admin/orders/delete/{id}', 'Admin\OrderController@index')->name('admin.orders.delete');

Route::get('/admin/orders/changeStatus/{id}', 'Admin\OrderController@changeStatus')
    ->name('admin.orders.changeStatus');

Route::get('/admin/search/orders', 'Admin\SearchController@orders')->name('admin.search.orders');

Route::get('/admin/search/order', 'Admin\SearchController@order')->name('admin.search.order');
/*Orders*/

/*Users*/
Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users');

Route::get('/admin/users/edit/{id}', 'Admin\UserController@edit')->name('admin.users.edit');

Route::post('/admin/users/update/{id}', 'Admin\UserController@update')->name('admin.users.update');

Route::post('/admin/users/delete/{id}', 'Admin\UserController@delete')->name('admin.users.delete');

Route::get('/admin/search/users', 'Admin\SearchController@users')->name('admin.search.users');

Route::get('/admin/search/user', 'Admin\SearchController@user')->name('admin.search.user');
/*Users*/

/*Admin routes*/