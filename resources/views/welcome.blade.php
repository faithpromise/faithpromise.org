@extends('layouts.default')

<?php $title = 'Join us for our current sermon series <span class="no-wrap">"' . $current_series->title . '"</span>'; ?>

@section('content')

    <div class="WelcomeHero">
        {{--<h1 class="">Welcome to Faith Promise</h1>--}}
        <div class="WelcomeHero-buttons">
            <a class="WelcomeHero-button" href="{{ route('locations') }}">Locations</a>
            <a class="WelcomeHero-button" href="{{ route('whatToExpect') }}">Get to Know Us</a>
        </div>
    </div>

    <style type="text/css" scoped>
        /* 320px */
        @media (max-width: 20em) {
            .CurrentSeries-container {
                background-image: url(<?= cdn_image('sm', 'full', $current_series->home_image, 'square') ?>);
            }
        }
        /* 480px */
        @media (max-width: 30em) {
            .CurrentSeries-container {
                background-image: url(<?= cdn_image('md', 'full', $current_series->home_image, 'square') ?>);
            }
        }
        /* 600px */
        @media (max-width: 37.5em) {
            .CurrentSeries-container {
                background-image: url(<?= cdn_image('lg', 'full', $current_series->home_image, 'square') ?>);
            }
        }
        /* 859px */
        @media (max-width: 53.6875em) {
            .CurrentSeries-container {
                background-image: url(<?= cdn_image('xl', 'full', $current_series->home_image, 'square') ?>);
            }
        }
        /* 860px */
        @media (min-width: 53.75em) {
            .CurrentSeries-container {
                background-image: url(<?= cdn_image('xl', 'full', $current_series->home_image, 'wide') ?>);
            }
        }
    </style>
    <div class="CurrentSeries">
        <div class="CurrentSeries-container">

            <icampus-countdown></icampus-countdown>

            {{--<div class="CurrentSeries-watch" href="http://icampus.faithpromise.org">--}}
            {{--<div class="CurrentSeries-watchContainer">--}}
            {{--<h3 class="CurrentSeries-watchHeading">Watch Online</h3>--}}

            {{--<div class="CurrentSeries-countdown">--}}
            {{--3days, 4hrs, 32 min, 5secs--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

    @cardsection(['cards' => $events, 'class' => 'Section--lightGrey'])

    @endcardsection

@endsection
