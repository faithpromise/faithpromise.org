<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index');
Route::get('/support-requests', 'SupportRequestsController@index');

// Sermons
Route::get('/sermons', ['as' => 'sermons', 'uses' => 'SermonsController@index']);
Route::get('/series/{series}', ['as' => 'series', 'uses' => 'SermonsController@series']);
Route::get('/series/{series_slug}/trailer', 'RedirectController@seriesPromo');
Route::get('/series/{series_slug}/series-promo', 'RedirectController@seriesPromo');
Route::get('/series/{series_slug}/series-promo-2', 'RedirectController@seriesPromo2');
Route::get('/series/{series}/{series_video}', ['as' => 'seriesVideo', 'uses' => 'SermonsController@video']);

Route::get('/app-api/series.json', ['as' => 'app_api_series_list', 'uses' => 'AppApiController@seriesList']);
Route::get('/app-api/series/{series}.json', ['as' => 'app_api_series', 'uses' => 'AppApiController@series']);
Route::get('/app-api/series/{series}/{series_video}.json', ['as' => 'app_api_series_video', 'uses' => 'AppApiController@video']);


// Events
Route::get('/events', ['as' => 'events', 'uses' => 'EventsController@index']);
Route::get('/events/calendar', ['as' => 'calendar', 'uses' => 'EventsController@calendar']);
Route::get('/events/calendar/{year}/{month}', ['as' => 'calendarMonth', 'uses' => 'EventsController@calendarMonth']);
Route::get('/events/{event}', ['as' => 'event', 'uses' => 'EventsController@event']);

// Campuses / Locations
Route::get('/locations', ['as' => 'locations', 'uses' => 'CampusesController@index']);
Route::get('/locations/{campus}', ['as' => 'location', 'uses' => 'CampusesController@detail']);

// Ministries
Route::get('/care', ['as' => 'care', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/family', ['as' => 'family', 'uses' => 'MinistriesController@family']);
Route::get('/fpkids', ['as' => 'fpKids', 'uses' => 'MinistriesController@fpkids']);
Route::get('/fpkids/welcome', ['as' => 'fpKidsWelcome', 'uses' => 'MinistriesController@fpKidsWelcome']);
Route::get('/fpkids/camp', ['as' => 'fpKidsCamp', 'uses' => 'MinistriesController@fpKidsCamp']);
Route::get('/fpkids/worship', ['as' => 'fpKidsWorship', 'uses' => 'MinistriesController@fpKidsWorship']);
Route::get('/kid-steps', ['as' => 'kidSteps', 'uses' => 'MainController@defaultPage']);
Route::get('/dedications', ['as' => 'dedications', 'uses' => 'MainController@defaultPage']);
Route::get('/fpstudents', ['as' => 'fpStudents', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/fpstudents/fusion', ['as' => 'fpStudentsFusion', 'uses' => 'MinistriesController@fusion']);
Route::get('/prayer', ['as' => 'prayer', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/worship', ['as' => 'worship', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/celebrate', ['as' => 'celebrate', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/creative', ['as' => 'creative', 'uses' => 'MinistriesController@creative']);

// Groups
Route::get('/groups', ['as' => 'groups', 'uses' => 'GroupsController@index']);
Route::get('/groups/search', ['as' => 'groupSearch', 'uses' => 'GroupsController@search']);
Route::get('/groups/short-term', ['as' => 'studies', 'uses' => 'GroupsController@studies']);
Route::get('/groups/short-term/{study}', ['as' => 'studyDetail', 'uses' => 'GroupsController@studyDetail']);
Route::get('/starting-point', ['as' => 'startingPoint', 'uses' => 'GroupsController@startingPoint']);
Route::get('/groups/new-leader', ['as' => 'newGroupLeader', 'uses' => 'GroupsController@newLeader']);
Route::get('/groups/leaders', ['as' => 'groupLeaders', 'uses' => 'GroupsController@leaders']);
Route::get('/groups/training', ['as' => 'groupTraining', 'uses' => 'GroupsController@training']);
Route::get('/groups/alignments', ['as' => 'groupAlignments', 'uses' => 'GroupsController@alignments']);
Route::get('/men', ['as' => 'men', 'uses' => 'GroupsController@men']);
Route::get('/women', ['as' => 'women', 'uses' => 'GroupsController@women']);
Route::get('/young-adults', ['as' => 'youngAdults', 'uses' => 'MinistriesController@defaultMinistryPage']);

// Missions
Route::get('/missions', ['as' => 'missions', 'uses' => 'MissionsController@index']);
Route::get('/missions/{location_slug}', ['as' => 'missionsLocation', 'uses' => 'MissionsController@location']);
Route::get('/love-local', ['as' => 'loveLocal', 'uses' => 'MissionsController@loveLocal']);
Route::get('/love-local/kids-hope-usa', ['as' => 'kidsHope', 'uses' => 'MissionsController@kidsHope']);
Route::get('/love-local/{organization}', ['as' => 'localOutreachOrganization', 'uses' => 'MissionsController@organization']);

// Staff
Route::get('/staff', ['as' => 'staff', 'uses' => 'StaffController@index']);
Route::get('/staff/directory', ['as' => 'staffDirectory', 'uses' => 'StaffController@directory']);
Route::get('/staff/{staff}', ['as' => 'staffDetail', 'uses' => 'StaffController@detail']);

// Next Steps
Route::get('/core', ['as' => 'core', 'uses' => 'MainController@defaultPage']);
Route::get('/baptism', ['as' => 'baptism', 'uses' => 'MainController@defaultPage']);
Route::get('/give', ['as' => 'give', 'uses' => 'MainController@defaultPage']);
Route::get('/next-steps', ['as' => 'nextSteps', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/salvation', ['as' => 'salvation', 'uses' => 'MainController@defaultPage']);
Route::get('/serve', ['as' => 'serve', 'uses' => 'VolunteerController@index']);
Route::get('/serve/opportunities', ['as' => 'volunteerPositions', 'uses' => 'VolunteerController@positions']);
Route::get('/serve/opportunities.json', ['as' => 'volunteerPositions', 'uses' => 'VolunteerController@positionsJson']);
Route::post('/serve/opportunities', ['as' => 'sendVolunteerMessage', 'uses' => 'VolunteerController@sendMessage']);

// General pages
Route::get('/what-to-expect', ['as' => 'whatToExpect', 'uses' => 'MainController@whatToExpect']);
Route::get('/beliefs-and-values', ['as' => 'beliefs', 'uses' => 'MainController@defaultPage']);
Route::get('/h4h', ['as' => 'h4h', 'uses' => 'MainController@defaultPage']);
Route::get('/fasting', ['as' => 'fasting', 'uses' => 'MainController@defaultPage']);
Route::get('/weddings', ['as' => 'weddings', 'uses' => 'MainController@defaultPage']);
Route::get('/stephen', ['as' => 'stephen', 'uses' => 'MainController@stephen']);
Route::get('/summit', ['as' => 'summit', 'uses' => 'MainController@defaultPage']);
Route::get('/updates', ['as' => 'updates', 'uses' => 'MainController@defaultPage']);
Route::get('/jobs', ['as' => 'jobs', 'uses' => 'JobsController@index']);
Route::get('/jobs/{job_slug}', ['as' => 'jobDetail', 'uses' => 'JobsController@detail']);
Route::get('/stable-boy', ['as' => 'stableBoy', 'uses' => 'MainController@defaultPage']);
Route::get('/infuse', ['as' => 'infuse', 'uses' => 'MainController@infuse']);
Route::get('/infuse/training', ['as' => 'infuse', 'uses' => 'MainController@infuseTraining']);
Route::get('/elevate', ['as' => 'elevate', 'uses' => 'MainController@elevate']);
Route::get('/elevate.rss', ['as' => 'elevateRss', 'uses' => 'MainController@elevateRss']);
Route::get('/christmas', ['as' => 'christmas', 'uses' => 'MainController@christmas']);
Route::get('/easter', ['as' => 'easter', 'uses' => 'MainController@easter']);
Route::get('/easter/times.json', ['uses' => 'MainController@easterTimes']);
Route::get('/new-fam-gift', ['uses' => 'MainController@defaultPage']);
Route::get('/gbb', ['uses' => 'MainController@defaultPage']);

// This redirect should only happen on the FP site, not the students site
Route::get('/fusion', 'RedirectController@fusion');

// Bible plan
Route::get('/bible-plan', ['as' => 'biblePlan', 'uses' => 'BiblePlanController@index']);
Route::get('/bible-plan/{month}-{day}', ['as' => 'biblePlanDay', 'uses' => 'BiblePlanController@day']);

// iCampus
Route::get('/countdown.js', ['as' => 'countdown', 'uses' => 'InternetCampusController@countdown']);

// Images
Route::get('/staff-8bit.css', 'StaffController@eightBitCss');
Route::get('/{display_size}/{image_size}/{image_path}', 'AssetsController@image')
    ->where('display_size', '(sm|md|lg|xl)')
    ->where('image_size', '(full|half|third|quarter)')
    ->where('image_path', '.*');
Route::get('/resized/{width}/{image_path}', 'AssetsController@resize')->where('image_path', '.*');
Route::get('/images/{image_path}', 'AssetsController@rawImage')->where('image_path', '.*');

// Docs
Route::get('/docs/{doc_path}', 'AssetsController@doc')->where('doc_path', '.*');

// Sitemap JSON for UNCSS
Route::get('/_sitemap.json', 'SiteMapController@index');

// Health checks
Route::get('/_healthcheck', 'HealthCheckController@index');

// Updates Vimeo data
Route::get('/vimeo', 'VideosController@updateVimeo');

// Catchall
if (!config('app.debug')) {
    Route::get('{path?}', ['uses' => 'MainController@catchall'])->where('path', '.+');
}
