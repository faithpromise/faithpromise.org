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
Route::get('/children', 'RedirectController@fpKids');
Route::get('/kidknex', 'RedirectController@fpKids');
Route::get('/promisekids', 'RedirectController@fpKids');
Route::get('/promiseland', 'RedirectController@fpKids');
Route::get('/business', 'RedirectController@groups');
Route::get('/classes', 'RedirectController@nextSteps');
Route::get('/cr', 'RedirectController@celebrate');
Route::get('/devotions', 'RedirectController@sermons');
Route::get('/media', 'RedirectController@sermons');
Route::get('/holidays', 'RedirectController@locations');
Route::get('/AndersonCampus', 'RedirectController@events');
Route::get('/dedication', 'RedirectController@dedications');
Route::get('/campus-expansion', 'RedirectController@h4h');
Route::get('/counseling', 'RedirectController@care');


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
