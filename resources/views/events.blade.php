@extends('layouts.page', ['title' => 'Events'])

@section('page')

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

@endsection