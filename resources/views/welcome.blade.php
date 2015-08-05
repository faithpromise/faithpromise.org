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

    @cardsection(['cards' => $events, 'class' => 'Section--lightGrey'])

    @endcardsection

@endsection
