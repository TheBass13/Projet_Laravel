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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/registermobile', 'RegisterMController@index')->name('registermobile');
Route::get('/loginmobile', 'LoginMController@index')->name('loginmobile');
Route::get('/subscriptionmobile', 'SubMController@index')->name('subscriptionmobile');


