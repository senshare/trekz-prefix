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

Route::prefix('admin')
  ->namespace('Admin')
  ->group(function () {
    Route::middleware(['guest'])->group(function () {
      Route::get('/login', 'Auth\\LoginController@index')->name('login-admin');
      Route::post('/login', 'Auth\\LoginController@process')->name('login-admin-process');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
      Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

      Route::resource('travel-package', 'TravelPackageController');
      Route::resource('gallery', 'GalleryController');
      Route::resource('transaction', 'TransactionController');
      Route::resource('user', 'UserController');
    });
  });

Route::get('/', 'HomeController@index')
  ->name('home');
Route::get('/detail/{slug}', 'DetailController@index')
  ->name('detail');

Route::post('/checkout/{id}', 'CheckoutController@process')
  ->name('checkout-process');

Route::get('/checkout/{id}', 'CheckoutController@index')
  ->name('checkout')
  ->middleware(['auth', 'verified']);

Route::post('/checkout/create/{detail_id}', 'CheckoutController@create')
  ->name('checkout-create')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckoutController@remove')
  ->name('checkout-remove')
  ->middleware(['auth', 'verified']);

Route::get('/checkout/confirm/{detail_id}', 'CheckoutController@success')
  ->name('checkout-success')
  ->middleware(['auth', 'verified']);

Auth::routes(['verify' => true]);
