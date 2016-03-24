<?php

return [
    'email'           => 'office@faithpromise.org',
    'phone'           => '(865) 251-2590',
    'audio_url'       => 'http://fpcresources.org/audio/',
    'cdn_url'         => (env('APP_ENV', 'local') === 'production') ? '//d16gqslxckkrrx.cloudfront.net' : '//faithpromise.192.168.10.10.xip.io',
    'assets_path'     => env('ASSETS_PATH', storage_path('assets')),
    'social_services' => ['facebook', 'twitter', 'instagram', 'pinterest', 'youtube', 'vimeo', 'github'],

    'heartbeat_backup' => env('HEARTBEAT_BACKUP', 'http://127.0.0.1'),
    'heartbeat_events_updated' => env('HEARTBEAT_EVENTS_UPDATED', 'http://127.0.0.1'),

    /*
    |--------------------------------------------------------------------------
    | FP Students domain
    |--------------------------------------------------------------------------
    |
    | Always fpstudents.org in production. Defaults to
    | fpstudents.192.168.10.10.xip.io in local environment or define
    | your own using STUDENTS_DOMAIN in .env
    |
    */

    'students_domain' => (env('APP_ENV', 'local') === 'production') ? env('STUDENTS_DOMAIN', 'fpstudents.org') : env('STUDENTS_DOMAIN', 'fpstudents.192.168.10.10.xip.io'),
];