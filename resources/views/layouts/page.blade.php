<?php

    $has_hero_image = isset($hero_image);
    $hero_image = $has_hero_image ? $hero_image : 'hero-placeholder.png';
    $hero_image_tall = str_replace('-wide.jpg', '-tall.jpg', $hero_image);

?>

@extends('layouts.default')

@section('content')

@if ($has_hero_image)

<style type="text/css" scoped>
    .hero_image { background-image: url({{ $hero_image_tall }}); }
    @media (min-width: 47.5rem) {
        .hero_image { background-image: url({{ $hero_image }}); }
    }
</style>

@else

<style type="text/css" scoped>
    .hero_image { background-image: url(/build/images/temp/hero-placeholder.png); }
</style>

@endif

<div class="Hero hero_image">

</div>

<div class="Content">
    @yield('content')
</div>

@endsection