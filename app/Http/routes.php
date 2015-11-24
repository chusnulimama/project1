<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/login/login', [
    'as'    => 'login.login',
    'uses'  => 'Auth\AuthController@login'
]);

Route::get('/home', 'HomeController@index');
Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
