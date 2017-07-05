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

Route::get('home', 'HomeController@index')->name('home');

Route::get('publish', [
    'middleware' => 'auth',
    'uses' => 'publicationController@showForm'
]);

Route::post('publish/send', [
    'middleware' => 'auth',
    'uses' => 'publicationController@sendForm'
])->name('sendPublish');

Route::get('publication/list', [
    'middleware' => 'auth',
    'uses' => 'publicationController@listPubs'
]);

Route::get('publication/{id}', [
    'middleware' => 'auth',
    'uses' => 'publicationController@detailPublication'
]);

Route::get('publication/edit/{id}', [
    'middleware' => 'auth',
    'uses' => 'publicationController@showEditForm'
]);

Route::post('publication/editDetailSend/{id}', [
    'middleware' => 'auth',
    'uses' => 'publicationController@sendEditDetailsForm'
]);

Route::post('publication/editPhotoSend/{id}', [
    'middleware' => 'auth',
    'uses' => 'publicationController@sendEditPhotoForm'
]);

Route::get('customer/list', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@customerList'
]);

Route::get('customer/historyForm', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@addmultihistoform'
]);

Route::post('customer/sendhistoryForm', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@sendmultihistoform'
]);

Route::get('customer/{id}', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@detailProfil'
]);

Route::get('customer/editform/{id}', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@editForm'
]);

Route::post('customer/edit/{id}', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@editprofil'
])->name('sendPublish');

Route::post('historyAdd/{id}', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@addhistory'
]);

Route::get('search/autocomplete/publication', [
    'middleware' => 'auth',
    'uses' => 'PublicationController@autoComplete'
]);

Route::get('search/publication', [
    'middleware' => 'auth',
    'uses' => 'PublicationController@search'
]);

Route::get('search/autocomplete/customer', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@autoComplete'
]);

Route::get('search/customer/', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@search'
]);

Route::get('search/customer/multihisto', [
    'middleware' => 'auth',
    'uses' => 'CustomerController@searchHisto'
]);

