@extends('layouts.default', ['title' => $video->title, 'hero_image' => $video->Series->hero_image])

@section('content')

    @include('partials.hero_video', [
        'video' => $video
    ])

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            @include ('partials.series_playlist', ['series' => $video->Series])
        </div>
    </div>

@endsection