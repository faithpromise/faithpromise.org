<!--TODO: Add page content-->
<!-- TODO: need hero graphic -->

@extends('layouts.page', ['title' => 'Events', 'hero_image' => '/build/images/locations/pellissippi-wide.jpg'])

@section('page')

    @include('partials.event_grid', ['events' => $events])

@endsection