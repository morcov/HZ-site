<?php

Route::group(array('before' => 'NotLogged'), function() {
    Route::get('/logout', 'UserController@logoutAction');
});

Route::group(array('before' => 'loggedInFor'), function() {
    Route::get('/registration', 'UserController@registrationAction');
    Route::post('/registration', 'UserController@registration');

    Route::get('/login', 'UserController@loginAction');
    Route::post('/login', 'UserController@login');
});

