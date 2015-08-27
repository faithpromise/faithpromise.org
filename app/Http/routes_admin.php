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

// API calls

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function () {

    Route::resource('events', 'Admin\EventsController');
    Route::resource('volunteer-positions', 'Admin\VolunteerPositionsController');
    Route::resource('volunteer-position-skills', 'Admin\VolunteerPositionSkillsController');
    Route::resource('volunteer-skills', 'Admin\VolunteerSkillsController');
    Route::resource('ministries', 'Admin\MinistriesController');

});