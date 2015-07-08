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

Route::get('/staff', 'StaffController@index');
Route::get('/partials/staff-by-campus', 'StaffController@staffByCampus');
Route::get('/partials/staff-by-name', 'StaffController@staffByName');


Route::get('/missions', 'MinistriesController@missions');
Route::get('/{ministry}', 'MinistriesController@index')->where('ministry', 'care|celebrate|family|fpkids|fpstudents|groups|men|prayer|women|worship|youngadults');

Route::get('/fpkids/welcome', function() {
    return view('fpkids-welcome');
});

// Catchall for pages
Route::get('/{page}', function($page) {
    return $page;
    return view($page);
})->where('page', '^.*');