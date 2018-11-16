<?php

/** @var \FaithPromise\Shared\Models\Campus $campus */

$student_easter_times = $campus->student_easter_times;
$student_christmas_times = $campus->student_christmas_times;

?>

@extends('layouts.page', ['title' => $campus->full_name, 'hero_image' => $campus->image])

@section('page')


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
    <p>We'd love to see you this weekend at our {{ $campus->full_name }}. You'll experience contemporary worship, an engaging message, and have a blast with friends.</p>
    <p>Located at {{ $campus->address }}, {{ $campus->city }}, {{ $campus->state }} {{ $campus->zip }}</p>
    <p>Contact us: (865) 251-2590</p>
    <strong>Regular service times are:</strong><br>
    @foreach($campus->student_times as $time)
        <span class="ServiceTimes-day">{!! $time->day !!}</span> at
        <span class="ServiceTimes-time">{!! $time->formatted_times !!}</span><br>
    @endforeach
    @if($student_christmas_times)
        <p>(See below for special <a href="#christmas-times">Christmas times</a>)</p>
    @endif
    @if($student_easter_times)
        <p>(See below for special <a href="#easter-times">Easter times</a>)</p>
    @endif
    @endintrosection

    @if ($student_easter_times)
        <div id="easter-times" class="HolidayTimesSection">
            <img class="HolidayTimesSection-campusPhoto" src="{{ resized_image_url($campus->image, 320, 'square') }}">
            <div class="HolidayTimesSection-container">
                <h2 class="HolidayTimesSection-title">Easter Service Times</h2>
                <h3 class="HolidayTimesSection-campus">{{ $campus->full_name }}</h3>
                {{--<p class="HolidayTimesSection-text">We're excited for you to visit one of our Easter Services.</p>--}}
                <ul class="HolidayTimesSection-schedule">
                    @foreach($student_easter_times as $time)
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

    @if ($student_christmas_times)
        <div id="christmas-times" class="HolidayTimesSection">
            <img class="HolidayTimesSection-campusPhoto" src="{{ resized_image_url($campus->image, 320, 'square') }}">
            <div class="HolidayTimesSection-container">
                <h2 class="HolidayTimesSection-title">Christmas Service Times</h2>
                <h3 class="HolidayTimesSection-campus">{{ $campus->full_name }}</h3>
                {{--<p class="HolidayTimesSection-text">We're excited for you to visit one of our Christmas Services.</p>--}}
                <ul class="HolidayTimesSection-schedule">
                    @foreach($student_christmas_times as $time)
                        <li class="HolidayTimesSection-service">
                            <span class="HolidayTimesSection-day">{!! $time->day !!}</span><br>
                            <span class="HolidayTimesSection-time">{!! $time->formatted_times !!}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions we\'d love to hear from you. Please contact us at #email#'])

@endsection