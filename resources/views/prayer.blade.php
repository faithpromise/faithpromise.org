<?php

$teams = [
        (object)[
                'q' => 'Pastor\'s Prayer Partners',
                'a' => 'Meets Sunday mornings in the large conference room (Room 114) one hour before the first service. During this prayer session, the team will join Pastor Chris in praying for his anointing and for the upcoming worship services.'
        ],
        (object)[
                'q' => 'Prayer Covering',
                'a' => 'These teams pray in the Worship Centers of each campus and provide prayer coverage for the upcoming weekend services, including volunteers and attendees.'
        ]
];

$intercessory_teams = [
        (object)[
                'q' => 'Prayer Support',
                'a' => 'Members of this team pray with individuals as requested: after church services and other times.'
        ],
        (object)[
                'q' => 'Celebrate',
                'a' => 'This ministry meets at 6:00 on Monday nights in Satellite-1 at Faith Promise. Teams are needed to pray individually and corporately for people as needs arise. These teams will also participate in group prayer for overall protection and guidance during the service and prayer time.'
        ],
        (object)[
                'q' => 'Outreach Ministries',
                'a' => 'These prayer teams are formed as needed in order to provide prayer for the special functions of the church.'
        ],
        (object)[
                'q' => 'Email Network',
                'a' => 'Members of this prayer team will be contacted through email and commit to pray specifically over personal prayer requests coming into the church every week by card, website, email, and phone, as well as specific prayer requests from Faith Promise staff. This requires daily monitoring of email.'
        ],
        (object)[
                'q' => 'Prayer Walkers',
                'a' => 'This team walks and prays in specific locations, addressing the prayer needs of the church or location.'
        ],
        (object)[
                'q' => 'Prayer Wall',
                'a' => 'A group of volunteers who regularly monitor the Prayer Wall and provide prayer support for the requests listed.'
        ]
];

?>

@extends('layouts.page', ['title' => 'Prayer Ministry'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Prayer', 'class' => 'IntroSection--compact'])
    <p>Become involved in or find prayer support through the Prayer Ministry at Faith Promise Church. Here you can find creative areas for prayer ministry or submit your <a href="http://faithpromiseweb.com/forms/view.php?id=3" class="no-wrap">prayer request</a> to our prayer team or choose to post your own request directly to our interactive <a href="#prayer-wall" class="no-wrap">Prayer Wall</a>.</p>
    <p>Our goal is to develop a more cohesive and fully integrated prayer community. Your input, participation and support are invaluable! We offer many opportunities for you to become involved.</p>
    @endintrosection

    @faqsection(['title' => 'Prayer Teams', 'class' => 'Section--lightGrey', 'faq' => $teams])
    @endfaqsection

    @faqsection(['title' => 'Intercessory Prayer Teams', 'faq' => $intercessory_teams])
    @endfaqsection

    <div id="prayer-wall">
        <iframe src="http://pray.faithpromiseweb.com/prayers.php" width="100%" height="3500" frameborder="0" scrolling="auto" name="prayerWall">&lt;a href="http://pray.faithpromiseweb.com/prayers.php" target="_blank"&gt;Prayer Wall&lt;/a&gt;</iframe>
    </div>


@endsection