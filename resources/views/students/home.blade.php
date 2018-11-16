@extends('layouts.default')

@section('content')

    <div class="StudentsWelcome-mobile Overlay">
        <img class="StudentsWelcome-svg" src="{{ cdn_image_raw('/images/fpstudents/fpstudents-welcome.svg') }}" title="Welcome to FP Students">
        @heroimage ([
            'image' => 'images/fpstudents/home-wide.jpg',
            'title' => 'Welcome to fpStudents'
        ])
    </div>

    <div class="StudentsWelcome" style="background-image:url({{ cdn_image('lg', 'full', 'images/fpstudents/welcome-wide.jpg') }}); background-size: cover;" >
        <video class="StudentsWelcome-video" autoplay loop controls="true">
            <source src="{{ cdn_image_raw('images/fpstudents/welcome.mp4') }}" type="video/mp4">
            {{--<source src="//s3.amazonaws.com/ns.video/newspring/promotions/homepage/headeralt.newspring.webm" type="video/webm">--}}
        </video>
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
                <p class="WelcomeBarItem-text">Learn more about fpStudents, our weekly gathering of 6th-12th grade students.</p>
                <span class="WelcomeBarItem-action">Get to Know Us<i class="icon icon-right-open"></i></span>
            </a>
            <a class="WelcomeBarItem WelcomeBarItem--parents WelcomeBarItem--withPhoto" href="{{ route('fpStudents_parents') }}">
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

    <div class="HomeSection">
        <div class="HomeSection-container">
            @include('partials.cards', ['cards' => $events])
            <p class="text-center">
                <a id="to_events_from_featuredEvents" class="Button" href="{{ route('events') }}">View All Events &amp; Updates</a>
            </p>
        </div>
    </div>

@endsection
