<?php

/** @var \FaithPromise\Shared\Models\Campus $campus */

$easter_times = $campus->easter_times;
$christmas_times = $campus->christmas_times;

// LATER: Put these in a central location. They're duplicated in other places. Search '$what_to_expect_cards'
$what_to_expect_cards = collect([
        (object)[
                'card_title'    => 'Children',
                'card_image'    => 'images/fpkids/logo-tall.jpg',
                'card_text'     => 'Our children\'s ministry meets during each adult service. Children learn and grow through large group teaching, crafts, stories, drama, and small group interaction.',
                'card_url_text' => 'About fpKids',
                'card_url'      => '/fpkids/',
                'card_link_id'  => 'to_fpKids_from_card'
        ],
        (object)[
                'card_title'    => 'Students',
                'card_image'    => 'images/fpstudents/worship-tall.jpg',
                'card_text'     => '6-12th grade students have a chance to grow closer to God and each other in a high-energy atmosphere that will change them each week.',
                'card_url_text' => 'About fpStudents',
                'card_url'      => '/fpstudents/',
                'card_link_id'  => 'to_fpStudents_from_card'
        ],
        (object)[
                'card_title'    => 'Worship',
                'card_image'    => 'images/worship/blount-worship-2-tall.jpg',
                'card_text'     => 'Our overall mission and purpose of the Worship Ministry of Faith Promise Church is to provide tools for engaging the hearts of men and women to the heart of God.',
                'card_url_text' => 'Worship',
                'card_url'      => '/worship/',
                'card_link_id'  => 'to_worship_from_card'
        ]
]);

?>

@extends('layouts.page', ['title' => $campus->full_name, 'hero_image' => $campus->image])

@section('page')

    @if($campus->slug === 'online')

        @introsection([
            'title' => $campus->full_name,
            'class' => 'IntroSection--center',
            'buttons' => [
                [
                    'title' => 'Watch Online',
                    'url' => 'http://icampus.faithpromise.org'
                ]
            ]
        ])
            <p>We'd love to see you this weekend on our Internet Campus. You'll experience dynamic worship, an engaging message, and live chat.</p>
            <strong>Regular service times are:</strong><br>
            @foreach($campus->times as $time)
                <span class="ServiceTimes-day">{!! $time->day !!}</span> at <span class="ServiceTimes-time">{!! $time->formatted_times !!}</span><br>
            @endforeach
            @if($christmas_times)
                <p>(See below for special <a href="#christmas-times">Christmas times</a>)</p>
            @endif
            @if($easter_times)
                <p>(See below for special <a href="#easter-times">Easter times</a>)</p>
            @endif
        @endintrosection

    @else

        @introsection([
            'title' => $campus->full_name,
            'class' => 'IntroSection--center',
            'buttons' => [
                [
                    'title' => 'Get Directions',
                    'url' => $campus->directions_url,
                    'target' => '_blank'
                ]
            ]
        ])
            <p>We'd love to see you this weekend at our {{ $campus->full_name }}. You'll experience contemporary worship and an engaging message from our Senior Pastor Chris Stephens.</p>
            <p>Located at {{ $campus->address }}, {{ $campus->city }}, {{ $campus->state }} {{ $campus->zip }}</p>
            <p>Contact us: (865) 251-2590</p>
            <strong>Regular service times are:</strong><br>
            @foreach($campus->times as $time)
                <span class="ServiceTimes-day">{!! $time->day !!}</span> at <span class="ServiceTimes-time">{!! $time->formatted_times !!}</span><br>
            @endforeach
            @if($christmas_times)
                <p>(See below for special <a href="#christmas-times">Christmas times</a>)</p>
            @endif
            @if($easter_times)
                <p>(See below for special <a href="#easter-times">Easter times</a>)</p>
            @endif
        @endintrosection

    @endif

    @if ($easter_times)
        <div id="easter-times" class="HolidayTimesSection">
            <img class="HolidayTimesSection-campusPhoto" src="{{ resized_image_url($campus->image, 320, 'square') }}">
            <div class="HolidayTimesSection-container">
                <h2 class="HolidayTimesSection-title">Easter Service Times</h2>
                <h3 class="HolidayTimesSection-campus">{{ $campus->full_name }}</h3>
                {{--<p class="HolidayTimesSection-text">We're excited for you to visit one of our Easter Services.</p>--}}
                <ul class="HolidayTimesSection-schedule">
                    @foreach($easter_times as $time)
                        <li class="HolidayTimesSection-service">
                            <span class="HolidayTimesSection-day">{!! $time->day !!}</span><br>
                            <span class="HolidayTimesSection-time">{!! $time->formatted_times !!}</span>
                        </li>
                    @endforeach
                </ul>
                {{--<p>--}}
                    {{--<a class="Button Button--light">More About Easter</a>--}}
                {{--</p>--}}
            </div>
        </div>
    @endif

    @if ($christmas_times)
        <div id="christmas-times" class="HolidayTimesSection">
            <img class="HolidayTimesSection-campusPhoto" src="{{ resized_image_url($campus->image, 320, 'square') }}">
            <div class="HolidayTimesSection-container">
                <h2 class="HolidayTimesSection-title">Christmas Service Times</h2>
                <h3 class="HolidayTimesSection-campus">{{ $campus->full_name }}</h3>
                {{--<p class="HolidayTimesSection-text">We're excited for you to visit one of our Christmas Services.</p>--}}
                <ul class="HolidayTimesSection-schedule">
                    @foreach($christmas_times as $time)
                        <li class="HolidayTimesSection-service">
                            <span class="HolidayTimesSection-day">{!! $time->day !!}</span><br>
                            <span class="HolidayTimesSection-time">{!! $time->formatted_times !!}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
    @endcardsection

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->full_name . ' Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection