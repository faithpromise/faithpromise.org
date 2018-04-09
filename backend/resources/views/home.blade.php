@extends('layouts.default')

@section('content')

    @if ($show_easter)
        <a id="to_wild_love_from_hero" href="/easter" title="Wild Love">
            <picture>
                <source media="(min-width: 1200px)" srcset="
                http:<?= resized_image_url('images/series/wild-love-wide.jpg', 1920, 'wide') ?> 1920w,
                http:<?= resized_image_url('images/series/wild-love-wide.jpg', 1680, 'wide') ?> 1680w,
                http:<?= resized_image_url('images/series/wild-love-wide.jpg', 1280, 'wide') ?> 1280w
            ">
                <source srcset="
                http:<?= resized_image_url('images/series/wild-love-tall.jpg', 1280, 'tall') ?> 1280w,
                http:<?= resized_image_url('images/series/wild-love-tall.jpg', 800, 'tall') ?> 800w,
                http:<?= resized_image_url('images/series/wild-love-tall.jpg', 480, 'tall') ?> 480w
            ">
                <img alt="Wild Love">
            </picture>
        </a>
    @else
        @heroimage ([
        'image' => $current_series->image,
        'title' => 'Current Sermon Series: ' . $current_series->title,
        'url' => $current_series->url
    ])
    @endif

    <div class="WelcomeBar">
        <div class="WelcomeBar-container">
            <a class="WelcomeBarItem WelcomeBarItem--locations" href="{{ route('locations') }}" title="Times &mp; Locations">
                <h2 class="WelcomeBarItem-heading">
                    <span>Times &amp; Locations</span>
                    <i class="icon icon-right-open"></i>
                </h2>
                <p class="WelcomeBarItem-text">Get times & directions to each of our campuses as well as online services. Join us this weekend. We'd love to see you there!</p>
                <span class="WelcomeBarItem-action">Find a Campus<i class="icon icon-right-open"></i></span>
            </a>
            <a class="WelcomeBarItem WelcomeBarItem--new" href="{{ route('whatToExpect') }}" title="What to Expect">
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
                    href="http://online.faithpromise.org"
                    series_title="{{ $current_series->title }}"
                    image="{{ cdn_image('xl', 'quarter', 'images/worship/pellissippi-stage-tall.jpg') }}"
                    live_image="{{ cdn_image('xl', 'quarter', 'images/worship/pellissippi-stage-2-tall.jpg') }}"
                    title="Watch Online">
                {!! $icampus_times !!}.
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
