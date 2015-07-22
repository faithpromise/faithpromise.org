<?php
    $hero_image_wide = isset($hero_image) ? $hero_image : 'images/pages/' . Request::path() . '-wide.jpg';
    $hero_image_tall = str_replace('-wide.jpg', '-tall.jpg', $hero_image_wide);
?>

@extends('layouts.default')

@section('content')

<style type="text/css" scoped>
    /* small <= 320px */
    .hero_image { background-image: url({{ cdn_image('sm', 'full', $hero_image_tall) }}); }

    /* medium >= 321px */
    @media (min-width: 20.0625rem) {
        .hero_image { background-image: url({{ cdn_image('md', 'full', $hero_image_wide) }}); }
    }

    /* large >= 601px */
    @media (min-width: 30.0625rem) {
        .hero_image { background-image: url({{ cdn_image('lg', 'full', $hero_image_wide) }}); }
    }

    /* x-large >= 481px */
    @media (min-width: 37.5625rem) {
        .hero_image { background-image: url({{ cdn_image('xl', 'full', $hero_image_wide) }}); }
    }
</style>

<div class="Hero hero_image">

</div>

<div class="Content">
    @yield('page')
</div>

@endsection