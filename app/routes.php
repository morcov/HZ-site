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
//PATTERN
Route::pattern('id', '[0-9]+');


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

