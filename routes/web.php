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

Route::resource('vouchers', 'VoucherController');


//Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('voucher', 'VoucherController@index');




Route::get('/login', 'AuthController@vista');
Route::post('/log', 'AuthController@myLogin');
