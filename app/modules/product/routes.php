<?php

$prefix = 'App\Modules\Product\Controllers\\';

Route::get('/', $prefix . 'ProductController@indexAction');

Route::group(array('before' => 'NotLogged'), function () use ($prefix) {
    Route::get('/product/add', $prefix . 'ProductController@addAction');
    Route::post('/product/add', $prefix . 'ProductController@addProduct');

    Route::get('/product/{id}/edit', $prefix . 'ProductController@editAction');
    Route::post('/product/{id}/edit', $prefix . 'ProductController@editProduct');

    Route::post('/comment', $prefix . 'CommentController@addComment');
    Route::put('/comment', $prefix . 'CommentController@deleteComment');
    Route::delete('/comment', $prefix . 'CommentController@deleteComment');
});

Route::get('/product/{id}', $prefix . 'ProductController@detailAction');

Route::get('/comment', $prefix . 'CommentController@getComments');

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