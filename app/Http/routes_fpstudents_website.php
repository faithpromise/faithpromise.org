<?php

use \Illuminate\Support\Facades\Route;

Route::group(['domain' => config('site.students_domain')], function() {

    Route::get('/', 'Students\MainController@index');

    Route::get('/leaders', 'Students\MainController@index');

    Route::get('/parents', 'Students\MainController@index');

    Route::get('/students', 'Students\MainController@index');

    Route::get('/sermons', 'Students\MainController@index');

    Route::any('{all}', 'Students\MainController@index');

});
