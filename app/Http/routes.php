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

Route::get('/login', [
    'as'    => 'login.login',
    'uses'  => 'Auth\AuthController@login'
]);

Route::get('/home', 'HomeController@index');
Route::get('/book', 'BookController@index');
Route::get('/book/create', 'BookController@create');
Route::post('/book/create', 'BookController@store');
Route::get('/book/edit', 'BookController@edit');
Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
