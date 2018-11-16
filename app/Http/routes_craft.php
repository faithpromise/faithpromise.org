<?php

// API calls

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'craft'], function () {

    Route::get('promos', 'Craft\PromosController@index');
    Route::get('sermons', 'Craft\SermonsController@index');
    Route::get('series', 'Craft\SeriesController@index');
    Route::get('staff', 'Craft\StaffController@index');
    Route::get('content-blocks', 'Craft\ContentBlocksController@index');
    Route::get('elevate', 'Craft\ElevateController@index');
    Route::get('infuse', 'Craft\InfuseController@index');
    Route::get('events', 'Craft\EventsController@index');
    Route::get('event-links', 'Craft\EventLinksController@index');
    Route::get('alignments', 'Craft\AlignmentsController@index');
    Route::get('leader-resources', 'Craft\GroupLeaderResourcesController@index');
    Route::get('mission-trips', 'Craft\MissionTripsController@index');
    Route::get('missionaries', 'Craft\MissionariesController@index');
    Route::get('orgs', 'Craft\OrganizationsController@index');
    Route::get('vols', 'Craft\VolunteerPositionsController@index');
    Route::get('bible', 'Craft\BiblePlanController@index');

});