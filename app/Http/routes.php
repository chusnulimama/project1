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
Route::get('/book', [
    'as'    => 'book',
    'uses'  => 'BookController@index']);
Route::get('/book/view/{id}', 'BookController@modal');
Route::get('/book/create', 'BookController@create');
Route::post('/book/create', 'BookController@store');
Route::get('/book/edit/{id}', 'BookController@edit');
Route::get('/book/sale-add/{id}', 'BookController@addSale');
Route::get('/book/receive-add/{id}', 'BookController@addReceive');
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
Route::post('/employee/update/{user_id}', [
    'as'    => 'employee.update',
    'uses'  => 'EmployeeController@update']);
Route::post('/employee/destroy/{user_id}', 'EmployeeController@destroy');

//cust control
Route::get('/customer/view/{user_id}', 'CustController@modal');
Route::get('/customer', [
    'as'    => 'cust',
    'uses'  => 'CustController@index']);
Route::get('/customer/create', 'CustController@create');
Route::post('/customer/create', 'CustController@store');
Route::get('/customer/edit/{user_id}', 'CustController@edit');
Route::post('customer/update/{user_id}', [
    'as'    => 'cust.update',
    'uses'  => 'CustController@update']);
Route::post('/customer/destroy/{user_id}', 'CustController@destroy');

//publisher control
Route::get('/publisher/view/{user_id}', 'PublishController@modal');
Route::get('/publisher', [
    'as'     => 'publish',
    'uses'   => 'PublishController@index']);
Route::get('/publisher/create', 'PublishController@create');
Route::post('/publisher/create', 'PublishController@store');
Route::get('/publisher/edit/{user_id}', [
    'as'     => 'publish.update',
    'uses'   => 'PublishController@update']);
Route::post('/publisher/destroy/{user_id}', 'PublishController@destroy');

//supplier control
Route::get('/supplier/view/{user_id}', 'SuppController@modal');
Route::get('/supplier', [
    'as'     => 'supp',
    'uses'   => 'SuppController@index']);
Route::get('/supplier/create', 'SuppController@create');
Route::post('/supplier/create', 'SuppController@store');
Route::get('/supplier/edit/{user_id}', [
    'as'     => 'supp.update',
    'uses'   => 'SuppController@update']);
Route::post('/supplier/destroy/{user_id}', 'SuppController@destroy');

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

Route::model('transaction_id', \App\Transaction::class);
//receive control
Route::get('/receive', [
    'as'    => 'receive',
    'uses'  => 'ReceiptController@index']);
Route::get('/receive/create', 'ReceiptController@create');
Route::post('/receive/create', 'ReceiptController@store');
Route::get('/receive/edit/{transaction_id}', 'ReceiptController@edit');
Route::post('/receive/update/{transaction_id}', [
    'as'    => 'receive.update',
    'uses'  => 'ReceiptController@update']);
Route::post('/receive/destroy/{transaction_id}', 'ReceiptController@destroy');

//sales control
Route::get('/sale', [
    'as'    => 'sale',
    'uses'  => 'SaleController@index']);
Route::get('/sale/create', 'SaleController@create');
Route::post('/sale/create', 'SaleController@store');
Route::get('/sale/edit/{trans_id}', 'SaleController@edit');
Route::post('/sale/update/{trans_id}', [
    'as'    => 'sale.update',
    'uses'  => 'SaleController@update']);
Route::post('/sale/destroy/{trans_id}', 'SaleController@destroy');

//delivery control
Route::get('/delivery', [
    'as'    => 'delivery',
    'uses'  => 'SaleController@index']);
Route::get('/delivery/create', 'SaleController@create');
Route::post('/delivery/create', 'SaleController@store');
Route::get('/delivery/edit/{trans_id}', 'SaleController@edit');
Route::post('/delivery/update/{trans_id}', [
    'as'    => 'delivery.update',
    'uses'  => 'SaleController@update']);
Route::post('/delivery/destroy/{trans_id}', 'SaleController@destroy');

//------------------------

Route::get('auth/{driver}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{driver}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});
