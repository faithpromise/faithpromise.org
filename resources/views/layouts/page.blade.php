<?php
    $hero_image = isset($hero_image) ? $hero_image : '/build/images/hero/' . Request::path() . '-wide.jpg';
    $hero_image_tall = str_replace('-wide.jpg', '-tall.jpg', $hero_image);
?>

@extends('layouts.default')

@section('content')

<style type="text/css" scoped>
    .hero_image { background-image: url({{ $hero_image_tall }}); }

    @media (min-width: 47.5rem) {
        .hero_image { background-image: url({{ $hero_image }}); }
    }
</style>

<div class="Hero hero_image">

</div>

<div class="Content">
    @yield('page')
</div>

@endsection