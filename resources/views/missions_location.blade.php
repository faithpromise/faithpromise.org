
@extends('layouts.page', ['hero_image' => '/build/images/missions/locations/' . $location->ident . '-wide.jpg'])

@section('page')

    <div class="TextSection TextSection--center">
        <div class="TextSection-container">
            <h2 class="TextSection-title">{{ $location->name }}</h2>

            <div class="TextSection-text">
                <p>Should we put some text here?</p>
            </div>
        </div>
    </div>

    @foreach ($trips as $trip)
    <div class="TextSection TextSection--compact Section--lightGrey">
        <div class="TextSection-container">
            <h2 class="TextSection-title">{{ $trip->date_range }}</h2>

            <div class="TextSection-text">
                {!! $trip->description !!}

                <p class="text-left">The approximate cost is {{ $trip->cost }}</p>

                <p class="text-left">Please contact {{ $trip->contact }} (<a href="mailto:{{ $trip->contact_email }}">{{ $trip->contact_email }}</a>) for additional information.</p>
            </div>
        </div>
    </div>
    @endforeach

@endsection