<?php

    $hero_image = isset($hero_image) ? $hero_image : 'images/pages/' . Request::path() . '-wide.jpg';
    $og_image = isset($og_image) ? $og_image : cdn_image('lg', 'full', $hero_image, 'tall');
    $og_image_width = isset($og_image_width) ? $og_image_width : '1200';
    $og_image_height = isset($og_image_height) ? $og_image_height : '675';
?>

@extends('layouts.default')

@section('content')

@inlinecss
<style type="text/css">
    /* small <= 320px */
    .hero_image { background-image: url({{ cdn_image('sm', 'full', $hero_image, 'tall') }}); }

    /* medium >= 321px */
    @media (min-width: 20.0625rem) {
        .hero_image { background-image: url({{ cdn_image('md', 'full', $hero_image, 'tall') }}); }
    }

    /* large >= 601px */
    @media (min-width: 30.0625rem) {
        .hero_image { background-image: url({{ cdn_image('lg', 'full', $hero_image, 'tall') }}); }
    }

    /* x-large >= 481px */
    @media (min-width: 37.5625rem) {
        .hero_image { background-image: url({{ cdn_image('xl', 'full', $hero_image, 'tall') }}); }
    }

    /* 760px */
    @media (min-width: 47.5rem) {
        .hero_image { background-image: url({{ cdn_image('xl', 'full', $hero_image, 'wide') }}); }
    }
</style>
@endinlinecss

<div class="Hero hero_image">

</div>

<div class="Content">
    @yield('page')
</div>

@endsection