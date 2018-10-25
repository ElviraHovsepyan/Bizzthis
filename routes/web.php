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

Route::get('/',                     ['uses'=>'IndexController@index',                   'as'=>'mainView']);
Route::get('/company',              ['uses'=>'IndexController@company',                 'as'=>'companyView']);


Route::get('/login',                ['uses'=>'AuthController@loginView',                'as'=>'loginView']);
Route::post('/login',               ['uses'=>'AuthController@login',                    'as'=>'login']);
Route::get('/register',             ['uses'=>'AuthController@registerView',             'as'=>'registerView']);
Route::post('/register',            ['uses'=>'AuthController@register',                 'as'=>'register']);
Route::get('/logout',               ['uses'=>'AuthController@logout',                   'as'=>'logout']);

Route::group(['prefix'=>'client'],function (){
    Route::get('/login',            ['uses'=>'AuthController@clientLoginView',          'as'=>'clientLoginView']);

});

Route::get('password/reset',            ['uses' => 'Auth\ForgotPasswordController@showLinkRequestForm', 'as' => 'password.request']);
Route::post('password/email',           ['uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',  'as' => 'password.email']);
Route::get('password/reset/{token}',    ['uses' => 'Auth\ResetPasswordController@showResetForm',        'as' => 'password.reset']);
Route::post('password/reset',           ['uses' => 'Auth\ResetPasswordController@reset',                'as' => 'password.update']);

Route::get('/auth/facebook',            ['uses'=>'FacebookController@redirectToFacebook',               'as'=>'fb_login']);
Route::get('/auth/facebook/callback',   'FacebookController@handleFacebookCallback');

Route::get('/auth/google',              ['uses'=>'GoogleController@redirectToGoogle',                   'as'=>'google_login']);
Route::get('/auth/google/callback',     'GoogleController@handleGoogleCallback');

Route::get('/auth/twitter',             ['uses'=>'TwitterController@redirectToTwitter',                 'as'=>'twitter_login']);
Route::get('/auth/twitter/callback',    'TwitterController@handleTwitterCallback');

Route::get('/sendmail',                 'AuthController@testMail');
