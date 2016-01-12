@extends('layouts.default')

@section('content')

    <div class="WelcomeHero">
        {{--<h1 class="">Welcome to Faith Promise</h1>--}}
        <div class="WelcomeHero-buttons">
            <a id="to_locations_from_hero" class="WelcomeHero-button" href="{{ route('locations') }}">Locations</a>
            <a id="to_whatToExpect_from_hero" class="WelcomeHero-button" href="{{ route('whatToExpect') }}">Get to Know Us</a>
        </div>
    </div>

@endsection
