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

Route::group(['prefix' => 'api'], function () {

    Route::resource('campuses', 'Api\CampusesController');
    Route::resource('events', 'Api\EventsController');
    Route::resource('volunteer-positions', 'Api\VolunteerPositionsController');
    Route::resource('volunteer-position-skills', 'Api\VolunteerPositionSkillsController');
    Route::resource('volunteer-skills', 'Api\VolunteerSkillsController');
    Route::resource('ministries', 'Api\MinistriesController');

});