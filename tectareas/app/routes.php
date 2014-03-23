<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::group(array('before' => 'guest'), function() {
	Route::get('sign-up', array('uses' => 'UserController@index'));
	Route::post('sign-up', array('uses' => 'UserController@store'));
	Route::get('/activate/{id}/{code}', array('uses' => 'UserController@activateAccount'));
	Route::get('/login', array('uses' => 'UserController@showLogin'));
	Route::post('/login', array('uses' => 'UserController@doLogin'));
});

Route::group(array('before' => 'auth'), function() {
    Route::resource('profile', 'UserController');
    Route::post('profile/{id}/change-password', array('uses' => 'UserController@changePassword'));
    Route::get('logout', array('uses' => 'UserController@doLogout'));
});
