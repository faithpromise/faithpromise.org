
@extends('layouts.page', ['hero_image' => 'images/missions/locations/' . $location->slug . '-wide.jpg'])

@section('page')

    @introsection(['title' => $location->name, 'class' => '', 'image' => ''])
    <!-- LATER: Add some text here -->
    @endintrosection

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