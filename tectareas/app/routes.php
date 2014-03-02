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


Route::resource('sign-up', 'SignUpController');
Route::get('/activate/{id}/{code}', array('uses' => 'SignUpController@activateAccount', 'before' => 'guest'));
Route::get('/login', array('uses' => 'SignUpController@showLogin', 'before' => 'guest'));
Route::post('/login', array('uses' => 'SignUpController@doLogin', 'before' => 'guest'));
Route::get('/logout', array('uses' => 'SignUpController@doLogout', 'before' => 'auth'));
