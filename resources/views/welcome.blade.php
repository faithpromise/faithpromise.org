@extends('layouts.default')

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
            .CurrentSeries {
                background-image: url(<?= cdn_image('sm', 'full', $current_series->home_image, 'square') ?>);
            }
        }

        /* 321px */
        @media (min-width: 20.0625em) {
            .CurrentSeries {
                background-image: url(<?= cdn_image('md', 'full', $current_series->home_image, 'square') ?>);
            }
        }

        /* 481px */
        @media (min-width: 30.0625em) {
            .CurrentSeries {
                background-image: url(<?= cdn_image('lg', 'full', $current_series->home_image, 'square') ?>);
            }
        }

        /* 601px */
        @media (min-width: 37.5625em) {
            .CurrentSeries {
                background-image: url(<?= cdn_image('xl', 'full', $current_series->home_image, 'square') ?>);
            }
        }

        /* 640px */
        @media (min-width: 40em) {
            .CurrentSeries {
                background-image: url(<?= cdn_image('xl', 'full', $current_series->home_image, 'tall') ?>);
            }
        }

        /* 860px */
        @media (min-width: 53.75em) {
            .CurrentSeries {
                background-image: url(<?= cdn_image('xl', 'full', $current_series->home_image, 'wide') ?>);
            }
        }
    </style>

    <div class="HomeSection">
        <div class="HomeSection-container">
            <div class="CurrentSeries">
                <a class="CurrentSeries-link" href="{{ $current_series->url }}"></a>
                <icampus-countdown></icampus-countdown>
            </div>
        </div>
        </div>
    </div>

    <div class="HomeSection">
        <div class="HomeSection-container">
            @include('partials.cards', ['cards' => $events, 'class' => 'gutter-half'])
        </div>
    </div>

@endsection
