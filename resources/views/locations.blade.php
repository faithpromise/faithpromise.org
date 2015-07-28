<?php
// IMAGE: Need hero image for staff
// IMAGE: add location photos
// PAGE: Add content
?>

@extends('layouts.page', ['title' => 'Locations', 'hero-image' => 'images/locations/pellissippi-wide.jpg'])

@section('page')

    @cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center'])
    <!-- TODO: Text is not centered. Center all cardsection text? Search for occurrences -->
    <p>Join us this weekend at a location near you.</p>
    @endcardsection

@endsection
