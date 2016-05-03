<?php

return [
    'email'                 => 'fpsglobal@faithpromise.org',
    'ident'                 => 'fpstudents',
    'name'                  => 'fpStudents',
    'title'                 => 'fpStudents - Student Ministry of Faith Promise Church',
    'description'           => 'The student ministry of Faith Promise Church', // TODO: Update title
    'logo'                  => 'logo-fpstudents',
    'logo_mark'             => 'logo-fpstudents-mark',
    'google_tag_manager_id' => 'GTM-PK3SNW',
    'nav'                   => [
        [
            'title' => 'Times & Locations',
            'url'   => '/locations',
            'id'    => 'locations'
        ],
        [
            'title' => 'Sermons',
            'url'   => '/sermons',
            'id'    => 'sermons'
        ],
        [
            'title' => 'Events',
            'url'   => '/events',
            'id'    => 'events'
        ]
    ],

    'footer_nav' => [
        [
            'title' => 'Times &amp; Locations',
            'url'   => '/locations',
            'id'    => 'to_locations_from_footer'
        ],
        [
            'title' => 'Events &amp; Updates',
            'url'   => '/updates',
            'id'    => 'to_events_from_footer'
        ],
        [
            'title' => 'Parent Blog',
            'url'   => 'http://fpstudents.tumblr.com',
            'id'    => 'to_blog_from_footer'
        ]
    ]
];