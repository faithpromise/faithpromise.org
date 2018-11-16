@extends('layouts.page', ['title' => 'fpStudents'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Welcome to fpStudents'])
    <p>fpStudents is the connection point for 6th-12th grade students at Faith Promise Church. Join us each Wednesday night for a worship service like no other! Loaded with exciting videos, live music, new friendships, and relevant teaching that connects the Bible to your life. fpStudents is a can't-miss experience that will kick-start your world!</p>
    <p>Check out what's going on this week and in the future at
        <a href="http://fpStudents.org">fpStudents.org</a>!
    </p>
    @endintrosection


    {{--
    ================================================================================
        Events
    ================================================================================ --}}

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $ministry->Events])
    @endcardsection


    {{--
    ================================================================================
        Serve
    ================================================================================ --}}

    {{--@bgsection(['title' => 'Get Involved', 'image' => 'images/fpstudents/worship-2-wide.jpg'])--}}
    {{--<p>Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>--}}
    {{--<p><a class="Button" href="http://fpstudents.com">Learn more</a></p>--}}
    {{--@endbgsection--}}


    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the fpStudents Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection