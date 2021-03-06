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
Route::get('/login',                ['uses'=>'AuthController@loginView',                'as'=>'loginView']);
Route::post('/login',               ['uses'=>'AuthController@login',                    'as'=>'login']);
Route::get('/register',             ['uses'=>'AuthController@registerView',             'as'=>'registerView']);
Route::post('/register',            ['uses'=>'AuthController@register',                 'as'=>'register']);
Route::get('/logout',               ['uses'=>'AuthController@logout',                   'as'=>'logout']);
Route::post('/map',                 ['uses'=>'MapsController@show',                     'as'=>'showMap']);
Route::post('/setNewCords',         ['uses'=>'MapsController@setNewCords',              'as'=>'setNewCords']);
Route::post('/filter',              ['uses'=>'IndexController@filter',                  'as'=>'filter']);
Route::post('/coord',               ['uses'=>'MapsController@setCoordinatesInStorage',  'as'=>'set_coords']);


Route::get('/company/{slug}',       ['uses'=>'CompanyController@companyDetails',       'as'=>'companyDetails']);


Route::group(['prefix'=>'client'],function (){
    Route::get('/login',            ['uses'=>'AuthController@clientLoginView',          'as'=>'clientLoginView']);
    Route::post('/price_dim',       ['uses'=>'ClientController@price_dim',              'as'=>'price_dim']);
    Route::post('/add_price',       ['uses'=>'ClientController@add_price',              'as'=>'add_price']);

    Route::group(['middleware'=>['auth','isClient']],function (){
        Route::get('/dashboard',        ['uses'=>'ClientController@dashboardView',          'as'=>'dashboardView']);
        Route::get('/prices',           ['uses'=>'ClientController@prices',                 'as'=>'dashboardPrices']);
        Route::get('/invoices',         ['uses'=>'ClientController@invoices',               'as'=>'dashboardInvoices']);
        Route::get('/insights',         ['uses'=>'ClientController@insights',               'as'=>'dashboardInsights']);
        Route::get('/profile',          ['uses'=>'ClientController@profile',                'as'=>'dashboardProfile']);
        Route::get('/settings',         ['uses'=>'ClientController@settings',               'as'=>'dashboardSettings']);
        Route::post('/settings',        ['uses'=>'ClientController@editCompany',            'as'=>'editCompany']);
    });
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/edit',                ['uses'=>'AuthController@editView',                'as'=>'editView']);
    Route::post('/edit',               ['uses'=>'AuthController@editProfile',             'as'=>'editProfile']);
    Route::post('/comment',            ['uses'=>'CompanyController@addComments',          'as'=>'addComments']);
    Route::get('/admin',               ['middleware'=>'IsAdmin','uses'=>'AdminController@adminView',                'as'=>'adminView']);
    Route::get('/client_edit',         ['middleware'=>'IsAdmin','uses'=>'AdminController@client_edit',              'as'=>'client_edit']);
    Route::post('/client_edit',        ['middleware'=>'IsAdmin','uses'=>'AdminController@edit',                     'as'=>'edit']);
    Route::get('/add_client',          ['middleware'=>'IsAdmin','uses'=>'AdminController@add_client_view',          'as'=>'add_client_view']);
    Route::post('/add_client',         ['middleware'=>'IsAdmin','uses'=>'AdminController@add_client',               'as'=>'add_client']);
    Route::get('/prices',              ['middleware'=>'IsAdmin','uses'=>'AdminController@prices',                   'as'=>'admin_prices']);
    Route::post('/prices',             ['middleware'=>'IsAdmin','uses'=>'AdminController@edit_prices',              'as'=>'edit_prices']);


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

Route::get('/auth/instagram',           ['uses'=>'InstagramController@redirectToInstagram',           'as'=>'instagram_login']);
Route::get('/auth/instagram/callback',  'InstagramController@handleInstagramCallback');

Route::get('/sendmail',                 'AuthController@testMail');


