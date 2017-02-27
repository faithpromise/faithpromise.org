<?php

// Internal redirects
Route::get('/series/the-power-to-change', 'RedirectController@alignments');
Route::get('/series', 'RedirectController@sermons');
Route::get('/contact', 'RedirectController@locations');
Route::get('/times-and-directions', 'RedirectController@locations');
Route::get('/newleader', 'RedirectController@newGroupLeader');
Route::get('/groupleaders', 'RedirectController@groupLeaders');
Route::get('/children', 'RedirectController@fpKids');
Route::get('/kidscamp', 'RedirectController@fpKidsCamp');
Route::get('/fpkidscamp', 'RedirectController@fpKidsCamp');
Route::get('/students', 'RedirectController@fpStudents');
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
Route::get('/kidshope', 'RedirectController@kidsHope');
Route::get('/kidrave', 'RedirectController@fpKidsWorship');
Route::get('/studies', ['uses' => 'RedirectController@shortTermGroups']);
Route::get('/studies/{study_slug}', ['uses' => 'RedirectController@shortTermGroup']);


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
Route::get('/rsvp', 'RedirectController@rsvp');
Route::get('/survey', 'RedirectController@survey');
Route::get('/operations', 'RedirectController@operations');
Route::get('/share', 'RedirectController@share');
Route::get('/ssp', 'RedirectController@sermonPlanningDoc');
Route::get('/dinner', 'RedirectController@dinner');

// Series
Route::get('/series/fifteen-year-anniversary/anniversary-transformation', 'RedirectController@fifteenYearTransformation');

// Staff
Route::get('/staff/macy-deel', 'RedirectController@macyScarbrough');
