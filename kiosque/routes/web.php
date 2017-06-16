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

use App\mobile;

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

Route::get('/mobile/login', 'UserMobileController@loginForm');
Route::get('/mobile/login/send', 'UserMobileController@login');
Route::get('/logout/mobile', 'UserMobileController@logout');
Route::post('/register/mobile', 'UserMobileController@register');