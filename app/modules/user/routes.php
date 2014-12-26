<?php

$prefix = 'App\Modules\User\Controllers\\';

Route::group(array('before' => 'NotLogged'), function() use ($prefix) {
    Route::get('/logout', $prefix . 'UserController@logoutAction');
});

Route::group(array('before' => 'loggedInFor'), function() use ($prefix) {
    Route::get('/registration', $prefix . 'UserController@registrationAction');
    Route::post('/registration', $prefix . 'UserController@registration');

    Route::get('/login', $prefix . 'UserController@loginAction');
    Route::post('/login', $prefix . 'UserController@login');
});

