<?php

use \Illuminate\Support\Facades\Route;

Route::group(['domain' => config('site.students_domain')], function () {

    Route::get('/', 'Students\MainController@index');

    Route::get('/leaders', 'Students\MainController@index');

    Route::get('/parents', ['as' => 'fpStudents_parents', 'uses' => 'Students\ParentsController@index']);
    Route::get('/parents/resources', ['as' => 'fpStudents_parentResources', 'uses' => 'Students\ParentsController@resources']);

    Route::get('/staff', ['as' => 'fpStudents_staff', 'uses' => 'Students\StaffController@staff']);
    Route::get('/staff/{staff}', ['as' => 'fpStudents_staffDetail', 'uses' => 'Students\StaffController@detail']);

    Route::get('/locations', ['as' => 'fpStudents_locations', 'uses' => 'Students\CampusesController@index']);
    Route::get('/locations/{campus}', ['as' => 'fpStudents_location', 'uses' => 'Students\CampusesController@detail']);

    Route::get('/events', 'Students\UpdatesController@events');
    Route::get('/updates', ['as' => 'fpStudents_updates', 'uses' => 'Students\UpdatesController@index']);
    Route::get('/updates/{event}', ['as' => 'fpStudents_update', 'uses' => 'Students\UpdatesController@detail']);

// Sermons
    Route::get('/sermons', ['as' => 'fpStudents_sermons', 'uses' => 'Students\SermonsController@index']);
    Route::get('/series/{series}', ['as' => 'fpStudents_series', 'uses' => 'Students\SermonsController@series']);
    Route::get('/series/{series}/{series_video}', ['as' => 'fpStudents_seriesVideo', 'uses' => 'Students\SermonsController@video']);

    Route::any('{all}', 'Students\MainController@index');

});
