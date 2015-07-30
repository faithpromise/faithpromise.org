<?php

$men = new stdClass();
$men->card_title = 'Men\'s Groups';
$men->card_text = 'Connect with other men for service or spiritual growth.';
$men->card_url = '/men';
$men->card_url_text = 'Learn more';
$men->card_image = 'images/pages/men-tall.jpg';

$women = new stdClass();
$women->card_title = 'Women\'s Groups';
$women->card_text = 'Join with other women as you grow in Christ.';
$women->card_url = '/women';
$women->card_url_text = 'Learn more';
$women->card_image = 'images/pages/women-tall.jpg';

$young = new stdClass();
$young->card_title = 'Young Adult Groups';
$young->card_text = 'Connect with other 18-30 year old adults.';
$young->card_url = '/youngadults';
$young->card_url_text = 'Learn more';
$young->card_image = 'images/pages/youngadults-tall.jpg';

$support = new stdClass();
$support->card_title = 'Support Groups';
$support->card_text = 'fp Celebrate meets on Monday nights at the FPC Pellissippi Campus starting at 6:00 pm and is a;time of helping people connect, heal, and grow.';
$support->card_url = '/celebrate';
$support->card_url_text = 'Learn more';
$support->card_image = 'images/pages/celebrate-tall.jpg';

$starting = new stdClass();
$starting->card_title = 'Starting Point Groups';
$starting->card_text = 'Starting Point helps participants explore the Bible and begin to understand key truths of the Christian faith.';
$starting->card_url = '/starting-point';
$starting->card_url_text = 'Learn more';
$starting->card_image = 'images/pages/worship-tall.jpg';

$group_types = collect([$men, $women, $young, $support, $starting]);

?>

@extends('layouts.page', ['title' => 'Groups'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Groups Ministry', 'class' => '', 'image' => ''])
    <p>We believe that faith comes alive when people connect with God and others. Sustained life change occurs as we are growing in a relationship with Christ and we prioritize intentional relationships with others. Groups provide people with the opportunity to Encounter God, Embrace Others, Engage the World Around Us, and Expand God's Kingdom through their group.</p>
    @endintrosection


    {{--
    ================================================================================
        Community Groups
    ================================================================================ --}}

    @bgsection(['title' => 'Community Groups', 'class' => '', 'image' => 'images/fpstudents/worship-2-wide.jpg'])
    <p>A group at Faith Promise is an environment where three or more people can connect to develop and grow in their relationship with Christ. We want to help you find a group that meets near your home or work.</p>
    <p>
        <a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7079&weekday=&start_time=">Find a Group</a>
    </p>
    @endbgsection


    {{--
    ================================================================================
        Interest Groups
    ================================================================================ --}}

    @cardsection(['title' => 'Interest Groups', 'class' => 'Section--lightGrey', 'cards' => $group_types])
    <p>You know how they say that no two snowflakes are alike? Groups are the same way. But to help you find a good match we've classified them into several categories</p>
    @endcardsection


    {{--
    ================================================================================
        Contact
    ================================================================================ --}}

    @textsection(['title' => 'Need Help?'])
    <p>If none of the other options have been helpful to you, we'd be glad to help you find a group. Email Jennifer Patrick at
        <a href="mailto:jenniferp@faithpromise.org">jenniferp@faithpromise.org</a> . Please include the nights that work best for you and a little about yourself (where you live, children, marital status, etc.).
    </p>
    @endtextsection


    {{--
    ================================================================================
        Leaders
    ================================================================================ --}}

    @bgsection([
        'title' => 'Group Leaders',
        'class' => 'BackgroundSection--right',
        'image' => 'images/worship/jesus-wide.jpg',
        'buttons' => [
            [
                'title' => 'Lead a group',
                'url' => '/newleader'
            ],
            [
                'title' => 'Resources',
                'url' => '/groupleaders'
            ]
        ]
    ])
    <p>Interesting in leading a group? Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life.</p>
    @endbgsection


    {{--
    ================================================================================
        Events
    ================================================================================ --}}

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $ministry->Events])
    @endcardsection


    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Groups Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection