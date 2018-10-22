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

Route::get('/auth/facebook', 'FacebookController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'FacebookController@handleFacebookCallback');

Route::get('/auth/google', 'GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('/login',                ['uses'=>'AuthController@loginView',                'as'=>'loginView']);
Route::post('/login',               ['uses'=>'AuthController@login',                    'as'=>'login']);
Route::get('/register',             ['uses'=>'AuthController@registerView',             'as'=>'registerView']);
Route::post('/login',               ['uses'=>'AuthController@register',                 'as'=>'register']);

