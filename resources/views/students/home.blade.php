@extends('layouts.default')

@section('content')

    <div class="StudentsWelcome Overlay">
        <img class="StudentsWelcome-svg" src="/images/fpstudents/fpstudents-welcome.svg" title="Welcome to FP Students">
        @heroimage ([
            'image' => 'images/fpstudents/home-wide.jpg',
            'title' => 'Welcome to fpStudents'
        ])
    </div>

    <div class="WelcomeBar">
        <div class="WelcomeBar-container">
            <a class="WelcomeBarItem WelcomeBarItem--locations" href="{{ route('locations') }}">
                <h2 class="WelcomeBarItem-heading">
                    <span>Times &amp; Locations</span>
                    <i class="icon icon-right-open"></i>
                </h2>
                <p class="WelcomeBarItem-text">Get times & directions to each of our 5 campuses and join us for fpStudents!</p>
                <span class="WelcomeBarItem-action">Find a Campus<i class="icon icon-right-open"></i></span>
            </a>
            <a class="WelcomeBarItem WelcomeBarItem--new" href="{{ route('whatToExpect') }}">
                <h2 class="WelcomeBarItem-heading">
                    <span>New Here?</span>
                    <i class="icon icon-right-open"></i>
                </h2>
                <p class="WelcomeBarItem-text">Lorm ipsum means that its really importent for you to stay off drugs and stay in scool...</p>
                <span class="WelcomeBarItem-action">Get to Know Us<i class="icon icon-right-open"></i></span>
            </a>
            <a class="WelcomeBarItem WelcomeBarItem--parents WelcomeBarItem--withPhoto" href="<!-- TODO: add url -->">
                <div class="WelcomeBarItem-contentWrap">
                    <h2 class="WelcomeBarItem-heading">
                        <span>Parents Guide</span>
                        <i class="icon icon-right-open"></i>
                    </h2>
                    <p class="WelcomeBarItem-text">We are excited to get to partner with parents in ministering to their students...</p>
                    <span class="WelcomeBarItem-action">Learn More<i class="icon icon-right-open"></i></span>
                </div>
                <div class="WelcomeBarItem-imageWrap">
                    <img src="/xl/half/images/fpstudents/worship-3-tall.jpg">
                </div>
            </a>
        </div>
    </div>

@endsection
