<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'api'], function () {
    Route::post('/login', 'UserApiController@login');
    Route::post('/register', 'UserApiController@register');
    Route::get('/getPublication','PublicationApiController@getPublication');
    Route::get('/getPublicationWithId/{id}','PublicationApiController@getPublicationWithId');
    Route::get('/getSubscriptionWithId/{id}','SubscriptionApiController@getSubscriptionWithId');
    Route::post('/editProfil','UserApiController@editProfil');
    Route::get('/detailProfil/{id}','UserApiController@detailProfil');
    Route::get('/getUserWithToken/{id}/{token}','UserApiController@getUserWithToken');
    Route::post('/confirmUser','UserApiController@confirmUser');
    Route::post('/subscription','SubscriptionApiController@subscription');
});