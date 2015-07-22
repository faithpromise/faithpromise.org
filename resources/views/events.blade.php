<!--TODO: Add page content-->
<!-- TODO: need hero graphic -->

@extends('layouts.page', ['title' => 'Events', 'hero_image' => 'images/campuses/pellissippi-wide.jpg'])

@section('page')

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

@endsection