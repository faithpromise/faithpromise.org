<?php

function formatted_service_times($times) {
    return '<span class="no-wrap">' . implode('</span>, <span class="no-wrap">', $times) . '</span>';
}

?>

@inlinecss()
<style type="text/css">
    .AfterTheFall-bg {
        background-image: url(<?= resized_image_url('images/easter/after-the-fall-bg.jpg', 1920) ?>);
    }
</style>
@endinlinecss

@extends('layouts.default', ['title' => 'Easter', 'body_class' => 'AfterTheFall-bg'])

@section('content')

    <div class="AfterTheFall">

        <div class="AfterTheFall-videosTab">

            <div class="VideoPlayer"><iframe src="https://player.vimeo.com/video/157875912?title=0&byline=0&portrait=0&badge=0&autoplay=false" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>

            <div class="AfterTheFall-videos">
                <div class="AfterTheFall-video">
                    <img src="<?= resized_image_url('images/general/default-tall.jpg', 480, 'tall') ?>">
                    <div class="AfterTheFall-videoTitle">
                        Title Here
                    </div>
                </div>
                <div class="AfterTheFall-video">
                    <img src="<?= resized_image_url('images/general/default-tall.jpg', 480, 'tall') ?>">
                    <div class="AfterTheFall-videoTitle">
                        Title Here
                    </div>
                </div>
                <div class="AfterTheFall-video">
                    <img src="<?= resized_image_url('images/general/default-tall.jpg', 480, 'tall') ?>">
                    <div class="AfterTheFall-videoTitle">
                        Title Here
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{--@videosection(['title' => 'What would you risk to save a friend?', 'class' => '', 'video' => '157875912'])--}}
    {{--<p>Based on true events, After The Fall follows the story of a man who risks it all to save his friend when a hunting trip in Montana turns tragic. Degrees separating life and death, three families pray that God will show up to save these men from a deadly storm.</p>--}}
    {{--@endvideosection--}}

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