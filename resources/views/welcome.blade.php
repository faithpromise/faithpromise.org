@extends('layouts.default')

@section('content')

    <div class="WelcomeHero">
        {{--<h1 class="">Welcome to Faith Promise</h1>--}}
        <div class="WelcomeHero-buttons">
            <a id="to_locations_from_hero" class="WelcomeHero-button" href="{{ route('locations') }}">Locations</a>
            <a id="to_whatToExpect_from_hero" class="WelcomeHero-button" href="{{ route('whatToExpect') }}">Get to Know Us</a>
        </div>
    </div>

    @inlinecss
    <style type="text/css">

        /* 569px */
        @media (max-width: 35.5625em) {
            .CurrentSeries-thumb {
                background-image: url(<?= cdn_image('md', 'full', $current_series->image, 'tall') ?>);
            }
        }

        /* 570px */
        @media (min-width: 35.625em) {
            .CurrentSeries-thumb {
                background-image: url(<?= cdn_image('lg', 'full', $current_series->image, 'wide') ?>);
            }
        }

        /* 768px */
        @media (min-width: 48em) {
            .CurrentSeries-thumb {
                background-image: url(<?= cdn_image('xl', 'quarter', $current_series->image, 'square') ?>);
            }
        }

        /* 1024px */
        @media (min-width: 64em) {
            .CurrentSeries-thumb {
                background-image: url(<?= cdn_image('xl', 'half', $current_series->image, 'tall') ?>);
            }
        }
    </style>
    @endinlinecss

    <div class="CurrentSeries">
        <div class="CurrentSeries-container">
            <div class="CurrentSeries-thumbWrap">
                <div class="CurrentSeries-thumb"></div>
            </div>
            <div class="CurrentSeries-countdownWrap">
                <icampus-countdown></icampus-countdown>
            </div>
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
