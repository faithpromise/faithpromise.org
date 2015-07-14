<!--TODO: Add page content-->


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

    @include('partials.event_grid', ['events' => $events, 'class' => 'Section--lightGrey'])

    @include('partials.staff_gallery', ['staff' => $staff, 'title' => 'Meet the fpStudents Staff'])

@endsection