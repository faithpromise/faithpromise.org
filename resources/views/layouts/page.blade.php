<?php

    $hero_title = isset($title) ? $title : null;
    $hero_image = isset($hero_image) ? $hero_image : 'images/pages/' . Request::path() . '-wide.jpg';
    $og_image = isset($og_image) ? $og_image : cdn_image('lg', 'full', $hero_image, 'tall');
    $og_image_width = isset($og_image_width) ? $og_image_width : '1200';
    $og_image_height = isset($og_image_height) ? $og_image_height : '675';
?>

@extends('layouts.default')

@section('content')

@heroimage ([
    'image' => $hero_image,
    'title' => $hero_title
])

<div class="Content">
    @yield('page')
</div>

@endsection