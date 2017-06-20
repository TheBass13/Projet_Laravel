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

// Routes non mobiles

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/publish', [
    'middleware' => 'auth',
    'uses' => 'publicationController@showForm'
]);

Route::post('/publish/send', [
    'middleware' => 'auth',
    'uses' => 'publicationController@sendForm'
])->name('sendPublish');

Route::get('/publish/list', [
    'middleware' => 'auth',
    'uses' => 'publicationController@listPubs'
])->name('listPublish');

// Routes mobiles

Route::get('/mobile/home', 'UserMobileController@home');
Route::get('/mobile', 'UserMobileController@home');
Route::get('/mobile/login', 'UserMobileController@loginForm');
Route::post('/mobile/login/send', 'UserMobileController@login');
Route::post('/mobile/logout', 'UserMobileController@logout');
Route::get('/mobile/register', 'UserMobileController@registerForm');
Route::post('/mobile/register/send', 'UserMobileController@register');