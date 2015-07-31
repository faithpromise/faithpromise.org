@extends('layouts.default', ['title' => $video->title, 'hero_image' => $video->Series->image])

@section('content')

    @include('partials.hero_video', [
        'video' => $video
    ])

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            @include ('partials.series_playlist', ['videos' => $videos])
        </div>
    </div>

@endsection