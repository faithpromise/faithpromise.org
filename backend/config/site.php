<?php

return [
    'phone'           => '(865) 251-2590',
    'audio_url'       => 'http://fpcresources.org/audio/',
    'cdn_url'         => (env('APP_ENV', 'local') === 'production') ? '//d16gqslxckkrrx.cloudfront.net' : '//faithpromise.192.168.10.10.xip.io',
    'assets_path'     => env('ASSETS_PATH', storage_path('assets')),
    'social_services' => ['facebook', 'twitter', 'instagram', 'pinterest', 'youtube', 'vimeo', 'github'],

    'give_url'       => 'https://fpctystn.infellowship.com/onlinegiving/history',
    'give_items_url' => 'https://give.idonate.com/faith-promise-church/donate',

    'heartbeat_backup' => env('HEARTBEAT_BACKUP', 'http://127.0.0.1'),
    'heartbeat_next_steps_date' => env('HEARTBEAT_NEXT_STEPS_DATE', 'http://127.0.0.1'),
    'heartbeat_events_updated' => env('HEARTBEAT_EVENTS_UPDATED', 'http://127.0.0.1'),

    'church_domain' => (env('APP_ENV', 'local') === 'production') ? env('DOMAIN', 'faithpromise.org') : env('DOMAIN', 'faithpromise.192.168.10.10.xip.io'),

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