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



Route::get('/login', 'AuthController@vista');
Route::post('/login', 'AuthController@myLogin');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::group(['middleware' => ['web', 'auth']], function () { #Reglas, tiene que estar logeado.
Route::resource('vouchers', 'VoucherController');
Route::resource('comments', 'CommentsController');
Route::get('/home', 'HomeController@index');
Route::get('/map', 'MapsController@index');
Route::post('/logout', 'AuthController@logout');
Route::get('/me', 'HomeController@chargeProfile');
Route::resource('users', 'UserController');
Route::get('/register', 'RegisterController@vista');
Route::post('/myregister', 'RegisterController@myRegister');
});
