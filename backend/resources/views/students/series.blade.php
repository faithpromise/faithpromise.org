@extends('layouts.page', [
    'title' => $series->title,
    'hero_image' => $series->image,
    'og_image' => cdn_image_raw($series->image, 'tall'),
    'og_type' => 'article'
])

@section('page')

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            @include ('partials.series_playlist', ['videos' => $videos])
        </div>
    </div>

@endsection