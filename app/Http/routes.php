<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

// Sermons
Route::get('/sermons', 'SermonsController@index');
Route::get('/series/{series}', ['as' => 'series', 'uses' => 'SermonsController@series']);
Route::get('/series/{series}/{video}', ['as' => 'seriesVideo', 'uses' => 'SermonsController@video']);

// Events
Route::get('/events', ['as' => 'events', 'uses' => 'EventsController@index']);
Route::get('/events/calendar', ['as' => 'calendar', 'uses' => 'EventsController@calendar']);
Route::get('/events/calendar/{year}/{month}', ['as' => 'calendarMonth', 'uses' => 'EventsController@calendarMonth']);
Route::get('/events/{id}-{slug}', ['as' => 'event', 'uses' => 'EventsController@event']);

// Campuses / Locations
Route::get('/locations', ['as' => 'locations', 'uses' => 'CampusesController@index']);

// Ministries
Route::get('/{ministry}', 'MinistriesController@defaultMinistryPage')->where('ministry', 'care|celebrate|family|fpkids|fpstudents|groups|men|prayer|women|worship|youngadults');
Route::get('/fpkids/welcome', 'MinistriesController@fpKidsWelcome');

// Next Steps
Route::get('/next-steps', ['as' => 'nextSteps', 'uses' => 'MainController@defaultPage']);

// Missions
Route::get('/missions', 'MissionsController@index');
Route::get('/missions/{location_ident}', 'MissionsController@location');

// Staff
Route::get('/staff', 'StaffController@index');
Route::get('/staff/directory', 'StaffController@directory');
Route::get('/partials/staff-by-campus', 'StaffController@staffByCampus');
Route::get('/partials/staff-by-name', 'StaffController@staffByName');

// General pages
Route::get('/what-to-expect', 'MainController@defaultPage');
Route::get('/beliefs-and-values', 'MainController@defaultPage');
Route::get('/salvation', 'MainController@defaultPage');
Route::get('/baptism', 'MainController@defaultPage');
Route::get('/h4h', 'MainController@defaultPage');
Route::get('/give', ['as' => 'give', 'uses' => 'MainController@defaultPage']);

// iCampus
Route::get('/countdown.js', 'InternetCampusController@countdown');

// Redirects
Route::get('/nextsteps', 'RedirectController@nextSteps');
Route::get('/series', 'RedirectController@sermons');
Route::get('/times-and-directions', 'RedirectController@locations');