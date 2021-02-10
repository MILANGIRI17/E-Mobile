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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/samsung', 'HomeController@samsung')->name('samsung');
Route::get('/iphone', 'HomeController@iphone')->name('iphone');
Route::get('/xiaomi', 'HomeController@xiaomi')->name('xiaomi');
Route::get('/admin', 'AdminController@create');
Route::get('/dashboard','AdminController@index');
Route::get('/dashboard/orders','AdminController@order');
Route::resource('product', 'ProductController');
Route::resource('cart', 'CartController');
Route::resource('order', 'OrderController');
Route::post('/admin/login','AdminController@login');
Route::post('/admin/register','AdminController@store');
Route::get('/detail/{id}', 'HomeController@detail');
Route::resource('rate', 'RateController');
Route::resource('compare', 'CompareController');
Route::get('/delete/compare','HomeController@deleteCompare');
Route::post('/search','HomeController@search');
Route::get('/dashboard/detail/{id}', 'HomeController@dashboarddetail');
Route::resource('bid', 'BidController');
Route::resource('bidding', 'BiddingController');
Route::get('/home/bid','HomeController@bid')->name('bidProduct');
Route::post('/home/bid/detail','HomeController@bidDetail');
Route::get('/dashboard/sell/{id}','AdminController@sellBid')->name('bidSell');
Route::get('/dashboard/bidWinners','AdminController@showWinner')->name('winner');