@extends('layouts.page', [
    'title' => $series->title,
    'hero_image' => $series->image,
    'og_image' => cdn_image_raw($series->image, 'tall'),
    'og_type' => 'article'
])

@section('page')

    <div class="SubHeader">
        <div class="SubHeader-title">
            &quot;Madness&quot; Sermon Series
        </div>
        <div class="SubHeader-share">
            Share &quot;Madness&quot; on: <a href="" facebook-share>Facebook</a> &amp;
            <a href="https://twitter.com/intent/tweet?text=Sneak%20peak%20of%20%40faithpromise%20original%20movie%2C%20%22After%20the%20Fall.%22%20%23fpeaster&url=http://faithpromise.org/easter">Twitter</a>
        </div>
    </div>

    <div class="SeriesList">
        <div class="SeriesList-item">
            <div class="SeriesList-imageWrap">
                <img class="SeriesList-image" src="{{ resized_image_url('images/series/madness-tall.jpg', 800, 'tall') }}">
            </div>
            <div class="SeriesList-info">
                <h3 class="SeriesList-title">3. The Ultimate Fulfillment</h3>
                <p class="SeriesList-meta">Dr. Chris Stephens <span class="SeriesList-metaDiv"></span> May 10, 2015</p>
                <p class="SeriesList-description">Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
            </div>
            <div class="SeriesList-actions">
                <a class="SeriesList-action">Watch Video</a>
                <a class="SeriesList-action">Listen to Audio</a>
                <a class="SeriesList-action">Share Sermon</a>
                <a class="SeriesList-action">Group Study</a>
            </div>
        </div>
    </div>

    <div class="SeriesBlank">
        <h2 class="SeriesBlank-title">Series Begins April 2</h2><!-- TODO: Replace hard coded date -->
        <a class="Button" href="{{ route('locations') }}">Find a Location</a>
    </div>

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            @include ('partials.series_playlist', ['videos' => $videos])
        </div>
    </div>

@endsection