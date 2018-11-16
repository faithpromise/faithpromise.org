@extends('layouts.page', ['title' => 'Locations'])

@section('page')

    @cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center'])
    <p>Join us at a location near you.</p>
    @endcardsection

@endsection
