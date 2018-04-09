<?php

use \Illuminate\Support\Facades\Route;

Route::group(['domain' => config('site.students_domain')], function () {

    Route::get('/', 'Students\MainController@index');

    Route::get('/parents', ['as' => 'fpStudents_parents', 'uses' => 'Students\ParentsController@index']);
    Route::get('/parents/resources', ['as' => 'fpStudents_parentResources', 'uses' => 'Students\ParentsController@resources']);

    Route::get('/staff', 'Students\StaffController@index');
    Route::get('/staff/{staff}', 'Students\StaffController@detail');

    Route::get('/locations', 'Students\CampusesController@index');
    Route::get('/locations/{student_campus}', 'Students\CampusesController@detail');

    Route::get('/events', 'Students\UpdatesController@index');
    Route::get('/events/{event}', 'Students\UpdatesController@detail');

    Route::get('/fusion', 'MinistriesController@fusion');

});
