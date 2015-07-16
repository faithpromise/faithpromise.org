<?php

$group_types = [
        [
                'title'    => 'Men\'s Groups',
                'text'     => 'Connect with other men for service or spiritual growth.',
                'url'      => '/men',
                'url_text' => 'Learn more',
                'image'    => '/build/images/hero/men-tall.jpg'
        ],
        [
                'title'    => 'Women\'s Groups',
                'text'     => 'Join with other women as you grow in Christ.',
                'url'      => '/women',
                'url_text' => 'Learn more',
                'image'    => '/build/images/hero/worship-tall.jpg'
        ],
        [
                'title'    => 'Young Adult Groups',
                'text'     => 'Connect with other 18-30 year old adults.',
                'url'      => '/youngadults',
                'url_text' => 'Learn more',
                'image'    => '/build/images/hero/youngadults-tall.jpg'
        ],
        [
                'title'    => 'Support Groups',
                'text'     => 'fp Celebrate meets on Monday nights at the FPC Pellissippi Campus starting at 6:00 pm and is a time of helping people connect, heal, and grow.',
                'url'      => '/celebrate',
                'url_text' => 'Learn more',
                'image'    => '/build/images/hero/celebrate-tall.jpg'
        ],
        [
                'title'    => 'Starting Point Groups',
                'text'     => 'Starting Point helps participants explore the Bible and begin to understand key truths of the Christian faith.',
                'url'      => '/starting-point',
                'url_text' => 'Learn more',
                'image'    => '/build/images/hero/worship-tall.jpg'
        ]
];

?>

@inject('snippets', 'App\Services\SnippetsService')

@extends('layouts.page', ['title' => 'Groups'])

@section('page')

    <div class="TextSection">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Groups Ministry</h2>

            <div class="TextSection-text">
                <p>We believe that faith comes alive when people connect with God and others. Sustained life change occurs as we are growing in a relationship with Christ and we prioritize intentional relationships with others. Groups provide people with the opportunity to Encounter God, Embrace Others, Engage the World Around Us, and Expand God's Kingdom through their group.</p>
            </div>
        </div>
    </div>

    <!-- TODO: change this image -->
    <style type="text/css" scoped>
        .community_groups_bg {
            background-image: url(/build/images/fpstudents/worship-2-wide.jpg);
        }
    </style>
    <div class="BackgroundSection community_groups_bg">
        <div class="BackgroundSection-container">
            <div class="BackgroundSection-text">
                <h2 class="BackgroundSection-title">Community Groups</h2>
                <p>A group at Faith Promise is an environment where three or more people can connect to develop and grow in their relationship with Christ. We want to help you find a group that meets near your home or work.</p>
                <p>
                    <a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7079&weekday=&start_time=">Find a Group</a>
                </p>
            </div>
        </div>
    </div>

    <div class="GridSection Section--lightGrey">
        <div class="GridSection-container">
            <h2 class="GridSection-title">Special Groups</h2>

            <div class="GridSection-text">
                <p>You know how they say that no two snowflakes are alike? Groups are the same way. But to help you find a good match we've classified them into several categories</p>
            </div>

            @include('partials.card_grid', ['cards' => $group_types])
        </div>
    </div>

    <div class="TextSection">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Need Help?</h2>

            <div class="TextSection-text">
                <p>If none of the other options have been helpful to you, we'd be glad to help you find a group. Email Jennifer Patrick at
                    <a href="mailto:jenniferp@faithpromise.org">jenniferp@faithpromise.org</a> . Please include the nights that work best for you and a little about yourself (where you live, children, marital status, etc.).
                </p>
            </div>
        </div>
    </div>

    <!-- TODO: change this image -->
    <style type="text/css" scoped>
        .become_group_leader_bg {
            background-image: url(/build/images/worship/jesus-wide.jpg);
        }
    </style>
    <div class="BackgroundSection BackgroundSection--right become_group_leader_bg">
        <div class="BackgroundSection-container">
            <div class="BackgroundSection-text">
                <h2 class="BackgroundSection-title">Group Leaders</h2>
                <p>Interesting in leading a group? <!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life.</p>
            </div>
            <p>
                <a class="Button" href="/newleader">Lead a group</a>
                <a class="Button" href="/groupleaders">Resources</a>
            </p>
        </div>
    </div>

    {!! $snippets->ministryEvents($ministry, 'Upcoming Events', 'Section--lightGrey') !!}
    {!! $snippets->ministryStaff($ministry, 'Groups Staff') !!}

@endsection