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

Route::get('/', 'App\Http\Controllers\ProductController@show')->name('shop');
Route::get('/product/{id}','App\Http\Controllers\ProductController@details');
Route::get('/checkout','App\Http\Controllers\OrderController@new')->name('checkout');
Route::post('/checkout','App\Http\Controllers\OrderController@store');
Route::post('/checkout/cookie','App\Http\Controllers\OrderController@storeCookie');
Route::get('/checkout/cookie','App\Http\Controllers\OrderController@invaild');
Route::post('/checkout/popcookie','App\Http\Controllers\OrderController@popCookie');
Route::get('/checkout/popcookie','App\Http\Controllers\OrderController@invaild');
/*Route::get('/cart', function () {
    return view('public.cart');
})->name('cart');*/
//adminroutes
Route::get('/admin/add-product','App\Http\Controllers\ProductController@new')->name('addProduct')->middleware('auth');
Route::get('/admin/edit-product/{url}','App\Http\Controllers\ProductController@edit')->name('editProduct')->middleware('auth');
Route::post('/admin/edit-product/{url}','App\Http\Controllers\ProductController@update')->name('updateProduct')->middleware('auth');
Route::post('/','App\Http\Controllers\ProductController@store');
Route::get('/admin/orders', 'App\Http\Controllers\OrderController@show' )->name('orders')->middleware('auth');
Route::get('/admin/orders/{id}','App\Http\Controllers\OrderController@details')->middleware('auth');
Route::post('/admin/orders/{id}','App\Http\Controllers\OrderController@updateOrder')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
