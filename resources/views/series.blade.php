@extends('layouts.page', ['title' => $series->title, 'hero_image' => $series->hero_image])

@section('page')

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            @include ('partials.series_playlist', ['series' => $series])
        </div>
    </div>

@endsection