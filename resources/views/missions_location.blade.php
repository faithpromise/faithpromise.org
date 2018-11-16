
@extends('layouts.page', ['hero_image' => 'images/missions/locations/' . $location->slug . '-wide.jpg'])

@section('page')

    @introsection(['title' => $location->name, 'class' => '', 'image' => ''])
    <!-- LATER: Add some text here -->
    @endintrosection

    @foreach ($trips as $trip)
    <div class="TextSection TextSection--compact Section--lightGrey">
        <div class="TextSection-container">
            @if($trip->title != $location->name)
                <h2 class="TextSection-title">{{ $trip->title }}</h2>
                <h3 class="TextSection-subtitle">{{ $trip->date_range }}</h3>
            @else
                <h2 class="TextSection-title">{{ $trip->date_range }}</h2>
            @endif
            @if ($trip->is_full)
                <h3 class="TextSection-subtitle" style="color: red;">This trip is full</h3>
            @endif

            <div class="TextSection-text">
                {!! $trip->description !!}

                @if ($trip->cost)
                <p class="text-left">The approximate cost is {{ $trip->cost }}</p>
                @endif

                <p class="text-left">Please contact {{ $trip->contact }} (<a href="mailto:{{ $trip->contact_email }}">{{ $trip->contact_email }}</a>) for additional information.</p>
            </div>
        </div>
    </div>
    @endforeach

@endsection