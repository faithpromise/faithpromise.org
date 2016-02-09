<?php

use \Illuminate\Support\Facades\Route;

Route::group(['domain' => config('site.students_domain')], function () {

    Route::get('/', 'Students\MainController@index');

    Route::get('/leaders', 'Students\MainController@index');

    Route::get('/parents', ['as' => 'fpStudents_parents', 'uses' => 'Students\ParentsController@index']);

    Route::get('/serve', ['as' => 'fpStudnets_serve', 'uses' => 'Students\MainController@serve']);

    Route::get('/students', 'Students\MainController@index');

    Route::get('/sermons', 'Students\MainController@index');

    Route::any('{all}', 'Students\MainController@index');

});
