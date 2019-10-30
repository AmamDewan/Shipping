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

    //Quotation Routes
    Route::resource('/quotation', 'QuotationController');
    Route::post('/quotation', 'QuotationController@store');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //Shipment Routes
    Route::get('/shipment',  'ShippingController@index')->name('shipment');
    Route::get('/shipment/create',  'ShippingController@create');
    Route::get('/shipment/{shipment}',  'ShippingController@show');
    Route::post('/shipment', 'ShippingController@store');



	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

