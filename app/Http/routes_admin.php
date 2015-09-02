<?php

// Authentication

Route::get('/admin/login', ['as' => 'adminLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/admin/login', ['as' => 'adminLogin', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/admin/logout', ['as' => 'adminLogout', 'uses' => 'Auth\AuthController@getLogout']);

// Index page

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'admin', 'uses' => 'Admin\AdminController@index']);
    Route::get('/{catchall}', ['uses' => 'Admin\AdminController@index'])->where('catchall', '(.*)');
});