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
    'as'    => 'login',
    'uses'  => 'Auth\AuthController@login'
]);
Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/home', 'HomeController@index');
//book control
//Route::bind('book', function($value){
//    return App\Book::find($value);
//});
Route::get('/book', [
    'as'    => 'book',
    'uses'  => 'BookController@index']);
Route::get('/book/view/{id}', 'BookController@modal');
Route::get('/book/create', 'BookController@create');
Route::post('/book/create', 'BookController@store');
Route::get('/book/edit/{id}', 'BookController@edit');
Route::post('/book/update/{id}', [
    'as'    => 'book.update',
    'uses'  => 'BookController@update']);
Route::post('/book/destroy/{id}', 'BookController@destroy');

//employee control
Route::get('/employee/view/{user_id}', 'EmployeeController@modal');
Route::get('/employee', [
    'as'    => 'employee',
    'uses'  => 'EmployeeController@index']);
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/create', 'EmployeeController@store');
Route::get('/employee/edit/{user_id}', 'EmployeeController@edit');
Route::post('/employee/update/{id}', [
    'as'    => 'employee.update',
    'uses'  => 'EmployeeController@update']);
Route::get('/book/destroy/{user_id}', 'EmployeeController@destroy');
Route::model('user_id', \App\User::class);

//cust control
Route::get('/customer', [
    'as'    => 'cust',
    'uses'  => 'CustController@index']);
Route::get('/customer/create', 'CustController@create');
Route::post('/customer/create', 'CustControllet@store');
Route::get('/customer/edit/{id}', 'CustController@edit');
Route::post('customer/update/{id}', [
    'as'    => 'cust.update',
    'uses'  => 'CustController@update']);
Route::get('/customer/destroy/{id}', 'CustController@destroy');

//role control
Route::get('/role', [
    'as'    => 'role',
    'uses'  => 'RoleController@index']);
Route::get('/role/create', 'RoleController@create');
Route::post('/role/create', 'RoleController@store');
Route::get('/role/edit/{id}', 'RoleController@edit');
Route::post('role/update/{id}', [
    'as'    => 'role.update',
    'uses'  => 'RoleController@update']);
Route::post('/role/destroy/{id}', 'RoleController@destroy');

//user control
Route::get('/user', [
    'as'    => 'user',
    'uses'  => 'UserController@index']);
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::get('/user/edit/{user_id}', 'UserController@edit');
Route::post('user/update/{user_id}', [
    'as'    => 'user.update',
    'uses'  => 'UserController@update']);
Route::post('/user/destroy/{user_id}', 'UserController@destroy');
Route::model('user_id', \App\User::class);

//------------------------

Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
