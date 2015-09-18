<?php

// LATER: Put these in a central location. They're duplicated in other places. Search '$what_to_expect_cards'
$what_to_expect_cards = collect([
        (object)[
                'card_title'    => 'Children',
                'card_image'    => 'images/fpkids/logo-tall.jpg',
                'card_text'     => 'Our children\'s ministry meets during each adult service. Children learn and grow through large group teaching, crafts, stories, drama, and small group interaction.',
                'card_url_text' => 'About fpKids',
                'card_url'      => '/fpkids/'
        ],
        (object)[
                'card_title'    => 'Students',
                'card_image'    => 'images/fpstudents/worship-tall.jpg',
                'card_text'     => '6-12th grade students have a chance to grow closer to God and each other in a high-energy atmosphere that will change them each week.',
                'card_url_text' => 'About fpStudents',
                'card_url'      => '/fpstudents/'
        ],
        (object)[
                'card_title'    => 'Worship',
                'card_image'    => 'images/worship/blount-worship-2-tall.jpg',
                'card_text'     => 'Our overall mission and purpose of the Worship Ministry of Faith Promise Church is to provide tools for engaging the hearts of men and women to the heart of God.',
                'card_url_text' => 'Worship',
                'card_url'      => '/worship/'
        ]
]);

?>

@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @if($campus->slug === 'online')

        @introsection([
            'title' => $campus->name . ' Campus',
            'class' => 'IntroSection--center',
            'buttons' => [
                [
                    'title' => 'Watch Online',
                    'url' => 'http://icampus.faithpromise.org'
                ]
            ]
        ])
            <p>We'd love to see you this weekend on our Internet Campus. You'll experience dynamic worship, an engaging message, and live chat.</p>
            <p><strong>Service times are:</strong> {!! $campus->times !!}.</p>
        @endintrosection

    @else

        @introsection([
            'title' => $campus->name . ' Campus',
            'class' => 'IntroSection--center',
            'buttons' => [
                [
                    'title' => 'Get Directions',
                    'url' => $campus->directions_url,
                    'target' => '_blank'
                ]
            ]
        ])
            <p>We'd love to see you this weekend at our {{ $campus->name }} Campus. You'll experience contemporary worship and an engaging message from our Senior Pastor Chris Stephens.</p>
            <p>Located at {{ $campus->address }}, {{ $campus->city }}, {{ $campus->state }} {{ $campus->zip }}</p>
            <p>Contact us: (865) 251-2590</p>
            <p><strong>Service times are:</strong> {!! $campus->times !!}.</p>
        @endintrosection

    @endif

    @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
    @endcardsection

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->name . ' Campus Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection