<?php

Route::group(array('before' => 'NotLogged'), function() {
    Route::get('/logout', 'UserController@logout');
});

Route::group(array('before' => 'loggedInFor'), function() {
    Route::get('/registration', 'UserController@registration');
    Route::post('/registration', 'UserController@registrationUser');

    Route::get('/login', 'UserController@login');
    Route::post('/login', 'UserController@loginUser');
});

