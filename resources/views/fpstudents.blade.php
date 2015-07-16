<!--TODO: Add page content-->

@inject('snippets', 'App\Services\SnippetsService')

@extends('layouts.page', ['title' => 'fpStudents'])

@section('page')

    <div class="TextSection">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Welcome to fpStudents</h2>

            <div class="TextSection-text">
                <p>fpStudents is the connection point for 6th-12th grade students at Faith Promise Church. Join us each Wednesday night for a worship service like no other! Loaded with exciting videos, live music, new friendships, and relevant teaching that connects the Bible to your life. fpStudents is a can't-miss experience that will kick-start your world!</p>
                <p>Check out what's going on this week and in the future at <a href="http://fpStudents.com">fpStudents.com</a>!</p>
            </div>
        </div>
    </div>

    {!! $snippets->ministryEvents($ministry, 'Upcoming Events', 'Section--lightGrey') !!}
    {!! $snippets->ministryStaff($ministry, 'Meet the fpStudents Staff') !!}

    <style type="text/css" scoped>
        .get_involved_bg {
            background-image: url(/build/images/fpstudents/worship-2-wide.jpg);
        }
    </style>

    <div class="BackgroundSection get_involved_bg">
        <div class="BackgroundSection-container">
            <div class="BackgroundSection-text">
                <h2 class="BackgroundSection-title">Get Involved</h2>
                <p><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
                <!-- TODO: Change link -->
                <p><a class="Button" href="http://fpstudents.com">Learn more</a></p>
            </div>
        </div>
    </div>

@endsection