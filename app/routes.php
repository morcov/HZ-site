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
Route::pattern('id', '[0-9]+');


Route::get('/', 'HomeController@index');
Route::get('/test', 'HomeController@test');

Route::get('/registration', 'UserController@registration');
Route::get('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

Route::post('/ajaxRegistrationUser', 'UserController@ajaxRegistrationUser');
Route::post('/ajaxLoginUser', 'UserController@ajaxLoginUser');


Route::get('/product/add', 'ProductController@add');
Route::get('/product/{id}', 'ProductController@detail');
Route::post('/ajaxAddProduct', 'ProductController@ajaxAddProduct');
Route::post('/ajaxAddComment', 'ProductController@ajaxAddComment');
Route::post('/ajaxDeleteComment', 'ProductController@ajaxDeleteComment');
Route::post('/ajaxGetComments', 'ProductController@ajaxGetComments');
