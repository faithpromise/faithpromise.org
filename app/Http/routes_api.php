<?php

// API calls

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {

    Route::resource('campuses', 'Api\CampusesController');
    Route::resource('events', 'Api\EventsController');
    Route::resource('volunteer-positions', 'Api\VolunteerPositionsController');
    Route::resource('volunteer-position-skills', 'Api\VolunteerPositionSkillsController');
    Route::resource('volunteer-skills', 'Api\VolunteerSkillsController');
    Route::resource('ministries', 'Api\MinistriesController');
    Route::resource('videos', 'Api\VideosController');
    Route::resource('groups', 'Api\GroupsController');

});