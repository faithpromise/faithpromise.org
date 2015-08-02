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
Route::get('/routes', 'MainController@routes');

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
Route::get('/locations/{location}', ['as' => 'location', 'uses' => 'CampusesController@detail']);

// Ministries
Route::get('/care', 'MinistriesController@defaultMinistryPage');
Route::get('/family', 'MinistriesController@defaultMinistryPage');
Route::get('/fpkids', 'MinistriesController@defaultMinistryPage');
Route::get('/fpkids/welcome', 'MinistriesController@fpKidsWelcome');
Route::get('/kidsteps', 'MinistriesController@kidsteps');
Route::get('/fpstudents', 'MinistriesController@defaultMinistryPage');
Route::get('/groups', 'MinistriesController@defaultMinistryPage');
Route::get('/men', 'MinistriesController@defaultMinistryPage');
Route::get('/prayer', 'MinistriesController@defaultMinistryPage');
Route::get('/women', 'MinistriesController@defaultMinistryPage');
Route::get('/worship', 'MinistriesController@defaultMinistryPage');
Route::get('/youngadults', 'MinistriesController@defaultMinistryPage');

// Next Steps
Route::get('/next-steps', ['as' => 'nextSteps', 'uses' => 'MainController@defaultPage']);

// Missions
Route::get('/missions', 'MissionsController@index');
Route::get('/missions/{location_ident}', 'MissionsController@location');

// Staff
Route::get('/staff', 'StaffController@index');
Route::get('/staff/directory', 'StaffController@directory');

// Next Steps
Route::get('/core', ['as' => 'core', 'uses' => 'MainController@defaultPage']);
Route::get('/baptism', ['as' => 'baptism', 'uses' => 'MainController@defaultPage']);
Route::get('/give', ['as' => 'give', 'uses' => 'MainController@defaultPage']);
Route::get('/salvation', ['as' => 'salvation', 'uses' => 'MainController@defaultPage']);

// General pages
Route::get('/what-to-expect', ['as' => 'whatToExpect', 'uses' => 'MainController@defaultPage']);
Route::get('/beliefs-and-values', 'MainController@defaultPage');
Route::get('/h4h', 'MainController@defaultPage');
Route::get('/weddings', 'MainController@defaultPage');

// iCampus
Route::get('/countdown.js', 'InternetCampusController@countdown');

// Redirects
Route::get('/nextsteps', 'RedirectController@nextSteps');
Route::get('/series', 'RedirectController@sermons');
Route::get('/times-and-directions', 'RedirectController@locations');