<?php

Route::group(array('before' => 'NotLogged'), function() {
    Route::get('/product/add', 'ProductController@add');

    Route::post('/comment', 'ProductController@addComment');
    Route::put('/comment', 'ProductController@deleteComment');
    Route::delete('/comment', 'ProductController@deleteComment');
});

Route::get('/product/{id}', 'ProductController@detail');
Route::post('/product', 'ProductController@addProduct');

Route::get('/comment', 'ProductController@getComments');
