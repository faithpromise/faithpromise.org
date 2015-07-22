<?php

return [
    'title'            => 'Faith Promise Church',
    'description'      => 'A contemporary church with locations in Knoxville, Maryville, Clinton, and La Follette, TN',
    'url'              => 'http://faithpromise.org',
    'email'            => 'info@faithpromise.org',
    'twitter_username' => 'faithpromise',
    'github_username'  => 'faithpromise',
    'audio_url'        => 'http://fpcresources.org/audio/',
    'cdn_url'          => env('CDN_URL', '//assets.faithpromise.192.168.10.10.xip.io'),
    'assets_path'      => env('ASSETS_PATH', base_path('../assets.faithpromise.org/public'))
];