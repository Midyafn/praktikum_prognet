<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/susbcribe', 'NewsletterController@add')->name('newsletter.add');

Route::get('/dashboard', 'AdminController@index')->name('admin.index')->middleware(['auth','admin']);
Route::patch('/dashboard', 'AdminController@updatereminder')->name('admin.reminder')->middleware(['auth','admin']);

Route::get('/order', 'AdminController@order')->name('admin.order')->middleware(['auth','admin']);
Route::get('/order/{id}', 'AdminController@show_order')->name('admin.showorder')->middleware(['auth','admin']);

Route::get('/user', 'AdminController@user')->name('admin.user')->middleware(['auth','admin']);

Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/filter','ProductController@filter')->name('product.filter');

Route::get('/product/{product}','ProductController@show')->name('product.show');

Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/add/{product}','CartController@add')->name('cart.add');
Route::get('/cart/remove/{id}','CartController@remove')->name('cart.remove');

Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@checkout')->name('checkout')->middleware('auth');

Route::get('/user/order','OrderController@show')->name('order.show')->middleware('auth');

Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit')->middleware('auth');
Route::patch('/profile/{user}','ProfileController@update')->name('profile.update')->middleware('auth');

Auth::routes();