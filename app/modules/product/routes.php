<?php

Route::get('/', 'ProductController@indexAction');

Route::group(array('before' => 'NotLogged'), function() {
    Route::get('/product/add', 'ProductController@addAction');
    Route::get('/product/edit/{id}', 'ProductController@editAction');
    Route::post('/product', 'ProductController@addProduct');
    Route::put('/product', 'ProductController@editProduct');

    Route::post('/comment', 'ProductController@addComment');
    Route::put('/comment', 'ProductController@deleteComment');
    Route::delete('/comment', 'ProductController@deleteComment');
});

Route::get('/product/{id}', 'ProductController@detailAction');

Route::get('/comment', 'ProductController@getComments');

/*
 Route::group(array('prefix' => 'product'), function()
{
    Route::group(array('before' => 'NotLogged'), function() {
        Route::get('/add', 'ProductController@add');
    });

    Route::get('/{id}', 'ProductController@detail');
    Route::post('/', 'ProductController@addProduct');

});

 Route::group(array('prefix' => 'comment'), function()
{

Route::group(array('before' => 'NotLogged'), function() {

    Route::post('/', 'ProductController@addComment');
    Route::put('/', 'ProductController@deleteComment');
    Route::delete('/', 'ProductController@deleteComment');
});

Route::get('/', 'ProductController@getComments');

});
*/