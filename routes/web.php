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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/shipping',  'ShippingController@index');
    Route::get('/shipping/{shipment}',  'ShippingController@show');
    Route::get('/shipping/create',  'ShippingController@create');
    Route::post('/shipping', 'ShippingController@store');
    Route::get('/home', 'HomeController@index')->name('home');
});


Auth::routes();

