<?php

function formatted_service_times($times) {
    return '<span class="no-wrap">' . implode('</span>, <span class="no-wrap">', $times) . '</span>';
}

?>

@extends('layouts.page', ['title' => 'Easter', 'hero_image' => 'images/pages/after-the-fall-tall.jpg'])

@section('page')

    @videosection(['title' => 'What would you risk to save a friend?', 'class' => '', 'youtube' => '5HRZ31jpWvA'])
    <p>Based on true events, After The Fall follows the story of a man who risks it all to save his friend when a hunting trip in Montana turns tragic. Degrees separating life and death, three families pray that God will show up to save these men from a deadly storm.</p>
    @endvideosection

    {{--@cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center Section--lightGrey'])--}}
    {{--<p>Our Faith Promise original film, &quot;After the Fall&quot; will be shown at all of our locations during the week leading up to Easter, and Easter weekend. Choose a location below for specific times and directions.</p>--}}
    {{--@endcardsection--}}

    <div class="Section Section--lightGrey">
        <div class="Section-container">
            <h2 class="Section-title text-center">Find a Location</h2>
            <p class="text-constrain">Our Faith Promise original film, &quot;After the Fall&quot; will be shown at all of our locations during the week leading up to Easter, and Easter weekend. Choose a day below for specific times and directions.</p>
            <special-services type="easter"></special-services>
        </div>
    </div>

    @bgsection([
        'title' => 'Easter Fun for the Kids',
        'class' => '',
        'image' => 'images/fpkids/rocket.jpg',
        'buttons' => [
                [
                    'title' => 'Learn More',
                    'url' => route('fpKids')
                ]
            ]
        ])
    <p>Exciting things are happening this Easter at fpKids! While you experience After the Fall, your kids (birth-5th grade) will enjoy age-appropriate stories & activities in fpKids.</p>
    @endbgsection

@endsection