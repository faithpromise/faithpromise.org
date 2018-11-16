<?php

$og_image = cdn_image('lg', 'full', $video->Series->image, 'tall');
$og_image_width = isset($og_image_width) ? $og_image_width : '1200';
$og_image_height = isset($og_image_height) ? $og_image_height : '675';

$page_title = $video->Series->title . ' - ' . $video->title;

?>

@extends('layouts.default', ['title' => $page_title])

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