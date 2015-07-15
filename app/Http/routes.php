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

Route::get('/', function () {
    return view('welcome');
});

// Events
Route::get('/events', 'EventsController@index');
Route::get('/events/calendar', 'EventsController@calendar');
Route::get('/events/calendar/{year}/{month}', 'EventsController@calendarMonth');

// Ministries
Route::get('/{ministry}', 'MainController@defaultMinistryPage')->where('ministry', 'care|celebrate|family|fpkids|fpstudents|groups|men|prayer|women|worship|youngadults');
Route::get('/fpkids/welcome', function () {
    return view('fpkids-welcome');
});

// Missions
Route::get('/missions', 'MissionsController@index');
Route::get('/missions/{location_ident}', 'MissionsController@location');

// Staff
Route::get('/staff', 'StaffController@index');
Route::get('/partials/staff-by-campus', 'StaffController@staffByCampus');
Route::get('/partials/staff-by-name', 'StaffController@staffByName');

Route::get('/test', function () {
    \Illuminate\Support\Facades\Artisan::call('events:import');
});