@extends('layouts.default')

@section('content')

    <div class="NewSeries">
        <img
            src="{{ cdn_image('xl', 'full', 'images/series/without-wide.jpg') }}"
            srcset="
                http:{{ cdn_image('xl', 'full', $current_series->image, 'wide') }} 1920w,
                http:{{ cdn_image('lg', 'full', $current_series->image, 'wide') }} 1200w,
                http:{{ cdn_image('md', 'full', $current_series->image, 'tall') }} 960w,
                http:{{ cdn_image('sm', 'full', $current_series->image, 'tall') }} 640w,
            "
        >
    </div>

    <div class="WelcomeBar">
        <div class="WelcomeBar-container">
            <a class="WelcomeBarItem WelcomeBarItem--locations" href="{{ route('locations') }}">
                <h2 class="WelcomeBarItem-heading">
                    <span>Times &amp; Locations</span>
                    <i class="icon icon-right-open"></i>
                </h2>
                <p class="WelcomeBarItem-text">Get times & directions to each of our campuses as well as online services. Join us this weekend. We'd love to see you there!</p>
                <span class="WelcomeBarItem-action">Find a Campus<i class="icon icon-right-open"></i></span>
            </a>
            <a class="WelcomeBarItem WelcomeBarItem--new" href="{{ route('whatToExpect') }}">
                <h2 class="WelcomeBarItem-heading">
                    <span>New Here?</span>
                    <i class="icon icon-right-open"></i>
                </h2>
                <p class="WelcomeBarItem-text">Get an overview of our weekend worship service, meet our staff, and learn about our students and kids ministries.</p>
                <span class="WelcomeBarItem-action">Get to Know Us<i class="icon icon-right-open"></i></span>
            </a>
            <a
                icampus-countdown
                class="WelcomeBarItem WelcomeBarItem--parents WelcomeBarItem--withPhoto"
                href="http://icampus.faithpromise.org"
                series_title="{{ $current_series->title }}"
                image="{{ cdn_image('xl', 'quarter', 'images/worship/pellissippi-stage-tall.jpg') }}"
                live_image="{{ cdn_image('xl', 'quarter', 'images/worship/pellissippi-stage-2-tall.jpg') }}">
                {!! $icampus_times !!}
            </a>
        </div>
    </div>

    <div class="HomeSection">
        <div class="HomeSection-container">
            @include('partials.cards', ['cards' => $events])
            <p class="text-center">
                <a id="to_events_from_featuredEvents" class="Button" href="{{ route('events') }}">See All Events</a>
            </p>
        </div>
    </div>

@endsection
