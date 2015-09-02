<?php

// API calls

Route::group(['prefix' => 'api'], function () {

Route::resource('campuses', 'Api\CampusesController');
Route::resource('events', 'Api\EventsController');
Route::resource('volunteer-positions', 'Api\VolunteerPositionsController');
Route::resource('volunteer-position-skills', 'Api\VolunteerPositionSkillsController');
Route::resource('volunteer-skills', 'Api\VolunteerSkillsController');
Route::resource('ministries', 'Api\MinistriesController');

});