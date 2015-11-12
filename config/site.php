<?php

return [
    'domain'             => (env('APP_ENV', 'local') === 'production') ? 'faithpromise.org' : ('faithpromise.' . $_SERVER['SERVER_ADDR'] . '.xip.io'),
    'fpstudents_domain'  => (env('APP_ENV', 'local') === 'production') ? 'fpstudents.org' : ('fpstudents.' . $_SERVER['SERVER_ADDR'] . '.xip.io'),
    'title'              => 'Faith Promise Church',
    'description'        => 'A contemporary church with locations in Knoxville, Maryville, Clinton, and La Follette, TN',
    'url'                => 'http://faithpromise.org',
    'email'              => 'office@faithpromise.org',
    'facebook_username'  => 'faithpromise',
    'instagram_username' => 'faithpromise',
    'twitter_username'   => 'faithpromise',
    'pinterest_username' => 'faithpromise',
    'github_username'    => 'faithpromise',
    'phone'              => '(865) 251-2590',
    'facebook_app_id'    => (env('APP_ENV', 'local') === 'production') ? '1592675454329086' : '1592691894327442',
    'audio_url'          => 'http://fpcresources.org/audio/',
    'cdn_url'            => (env('APP_ENV', 'local') === 'production') ? '//d3m6gouty6q7nm.cloudfront.net' : '//faithpromise.192.168.10.10.xip.io',
    'assets_path'        => env('ASSETS_PATH', storage_path('assets')),
];