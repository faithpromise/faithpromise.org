@extends('layouts.page', ['hero_image' => $current_series->hero_image])

<?php $title = 'Join us for our current sermon series <span class="no-wrap">"' . $current_series->title . '"</span>'; ?>

@section('page')

    @introsection(['title' => $title, 'class' => '', 'image' => '', 'buttons' => [
        [
            'title' => 'Times & Directions',
            'url' => '/locations'
        ],
        [
            'title' => 'What to Expect',
            'url' => '/what-to-expect'
        ],
        [
            'title' => 'Watch Online',
            'url' => '//icampus.faithpromise.org'
        ]
    ]])
    <p class="sentence-compact"><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
    @endintrosection

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

@endsection
