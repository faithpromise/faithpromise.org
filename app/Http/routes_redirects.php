<?php

// Internal redirects

Route::get('/nextsteps', 'RedirectController@nextSteps');
Route::get('/series', 'RedirectController@sermons');
Route::get('/contact', 'RedirectController@locations');
Route::get('/times-and-directions', 'RedirectController@locations');
Route::get('/bibleplan', 'RedirectController@biblePlan');
Route::get('/youngadults', 'RedirectController@youngAdults');
Route::get('/newleader', 'RedirectController@newGroupLeader');
Route::get('/groupleaders', 'RedirectController@groupLeaders');
Route::get('/lovelocal', 'RedirectController@loveLocal');
Route::get('/kidsteps', 'RedirectController@kidSteps');

// Shortcut redirects to external sites

Route::get('/allstaff', 'RedirectController@allStaff');
Route::get('/campuspastors', 'RedirectController@campusPastors');
Route::get('/gmail', 'RedirectController@gMail');
Route::get('/lessons', 'RedirectController@lessons');
Route::get('/questions', 'RedirectController@lessons');
Route::get('/request', 'RedirectController@requests');
Route::get('/requests', 'RedirectController@requests');
Route::get('/feedback', 'RedirectController@feedback');
Route::get('/icampus', 'RedirectController@icampus');
Route::get('/app', 'RedirectController@app');
Route::get('/retiree', 'RedirectController@retirees');
Route::get('/retirees', 'RedirectController@retirees');
Route::get('/candidate', 'RedirectController@candidates');
Route::get('/candidates', 'RedirectController@candidates');
