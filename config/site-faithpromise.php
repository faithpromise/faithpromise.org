<?php

return [
    'email'                 => 'office@faithpromise.org',
    'ident'                 => 'faithpromise',
    'name'                  => 'Faith Promise Church',
    'title'                 => 'Faith Promise Church',
    'description'           => 'A contemporary church with locations in Knoxville, Maryville, Clinton, and La Follette, TN',
    'facebook'              => 'faithpromise',
    'instagram'             => 'faithpromise',
    'twitter'               => 'faithpromise',
    'pinterest'             => 'faithpromise',
    'vimeo'                 => 'faithpromise',
    'github'                => 'faithpromise',
    'facebook_app_id'       => (env('APP_ENV', 'local') === 'production') ? '1592675454329086' : '1592691894327442',
    'logo'                  => 'logo-faith-promise',
    'logo_mark'             => 'logo-fp',
    'google_tag_manager_id' => 'GTM-T6L864',
    'podcast_url'           => 'https://itun.es/us/tfmeeb.c',

    'nav' => [
        [
            'title'  => 'About',
            'subnav' => [
                [
                    'title' => 'What to Expect',
                    'url'   => '/what-to-expect',
                    'id'    => 'whatToExpect'
                ],
                [
                    'title' => 'Meet Our Staff',
                    'url'   => '/staff',
                    'id'    => 'staff'
                ],
                [
                    'title' => 'Beliefs & Values',
                    'url'   => '/beliefs-and-values',
                    'id'    => 'beliefs'
                ],
                [
                    'title' => 'Heart for the Harvest',
                    'url'   => '/h4h',
                    'id'    => 'h4h'
                ]
            ]
        ],
        [
            'title' => 'Locations',
            'url'   => '/locations',
            'id'    => 'locations'
        ],

        [
            'title'  => 'Ministries',
            'subnav' => [
                [
                    'title' => 'Children',
                    'url'   => '/fpkids',
                    'id'    => 'fpkids'
                ],
                [
                    'title' => 'Students',
                    'url'   => '/fpstudents',
                    'id'    => 'fpstudents'
                ],
                [
                    'title' => 'Groups',
                    'url'   => '/groups',
                    'id'    => 'groups'
                ],
                [
                    'title' => 'Missions',
                    'url'   => '/missions',
                    'id'    => 'missions'
                ],
                [
                    'title' => 'Prayer Ministry',
                    'url'   => '/prayer',
                    'id'    => 'prayer'
                ],
                [
                    'title' => 'Worship',
                    'url'   => '/worship',
                    'id'    => 'worship'
                ],
                [
                    'title' => 'Care Ministries',
                    'url'   => '/care',
                    'id'    => 'care'
                ],
                [
                    'title' => 'fp Celebrate',
                    'url'   => '/celebrate',
                    'id'    => 'celebrate'
                ]
            ]
        ],
        [
            'title' => 'Next Steps',
            'url'   => '/nextsteps',
            'id'    => 'nextSteps'
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
        ],
        [
            'title' => 'Give',
            'url'   => '/give',
            'id'    => 'give'
        ]
    ],

    'footer_nav' => [
        [
            'title' => 'Times &amp; Locations',
            'url'   => '/locations',
            'id'    => 'to_locations_from_footer'
        ],
        [
            'title' => 'Get updates',
            'url'   => '/updates',
            'id'    => 'to_updates_from_footer'
        ],
        [
            'title' => 'Events',
            'url'   => '/events',
            'id'    => 'to_events_from_footer'
        ],
        [
            'title' => 'Blog',
            'url'   => 'http://blog.faithpromise.org',
            'id'    => 'to_blog_from_footer'
        ],
        [
            'title' => 'Jobs',
            'url'   => '/jobs',
            'id'    => 'to_jobs_from_footer'
        ],
        [
            'title' => 'Give Online',
            'url'   => '/give',
            'id'    => 'to_give_from_footer'
        ]
    ]
];
