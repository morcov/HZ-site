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

Route::group(array('before' => 'NotLogged'), function()
{
    Route::get('/product/add', 'ProductController@add');
    Route::get('/logout', 'UserController@logout');
});

Route::group(array('before' => 'loggedInFor'), function()
{
    Route::get('/registration', 'UserController@registration');
    Route::get('/login', 'UserController@login');
});

Route::get('/', 'HomeController@index');

//USER

Route::post('/registration', 'UserController@registrationUser');
Route::post('/login', 'UserController@loginUser');

//PRODUCT
Route::get('/product/{id}', 'ProductController@detail');
Route::post('/product', 'ProductController@addProduct');

Route::get('/comment', 'ProductController@getComments');
Route::post('/comment', 'ProductController@addComment');
Route::put('/comment', 'ProductController@deleteComment');
Route::delete('/comment', 'ProductController@deleteComment');

//TESTING
Route::get('/test', 'HomeController@test');
Route::any('form-submit', function(){
    if (Input::hasFile('file')) {
        $file            = Input::file('file');
        $destinationPath = public_path().'/files/';
        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        return $file->getClientOriginalName();
    }
});

//FILTERS
Route::filter('NotLogged', function(){
    if(!User::isLogin())
        header('location: '.action('UserController@login'));
});

Route::filter('loggedInFor', function(){
    if(User::isLogin())
        header('location: '.action('HomeController@index'));
});
