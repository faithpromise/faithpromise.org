<?php

/** @var \FaithPromise\Shared\Models\Campus $campus */

$easter_times = $campus->easter_times;
$christmas_times = $campus->christmas_times;

?>

@extends('layouts.page', ['title' => $campus->full_name, 'hero_image' => $campus->image])

@section('page')

    @if ($easter_times)
        <div id="easter-times" class="HolidayTimesSection HolidayTimesSection--dark">
            <img class="HolidayTimesSection-campusPhoto" src="{{ resized_image_url($campus->image, 320, 'square') }}">
            <div class="HolidayTimesSection-container">
                <h2 class="HolidayTimesSection-title">Easter Service Times at {{ $campus->name }}</h2>
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

    @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
    @endcardsection

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->full_name . ' Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection