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

Route::get('/sermons', 'SermonsController@index');
Route::get('/series/{series}/{video}', ['as' => 'video', 'uses' => 'SermonsController@video']);

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

// About
Route::get('/what-to-expect', function () {
    return view('what-to-expect');
});

// About
Route::get('/baptism', function () {
    return view('baptism');
});

// Images
Route::get('/cdn/hero/{path}', ['as' => 'hero_image', 'uses' => 'ImagesController@hero'])->where('path', '.*');
Route::get('/cdn/card/{path}', ['as' => 'card_image', 'uses' => 'ImagesController@card'])->where('path', '.*');
Route::get('/cdn/profile/{path}', ['as' => 'profile_image', 'uses' => 'ImagesController@profile'])->where('path', '.*');
Route::get('/cdn/album/{path}', ['as' => 'album_image', 'uses' => 'ImagesController@album'])->where('path', '.*');

Route::get('/test', function () {
    \Illuminate\Support\Facades\Artisan::call('events:import');
});

