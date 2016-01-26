<?php

// LATER: Put these in a central location. They're duplicated in other places. Search '$what_to_expect_cards'
$what_to_expect_cards = collect([
        (object)[
                'card_title'    => 'Children',
                'card_image'    => 'images/fpkids/logo-tall.jpg',
                'card_text'     => 'Our children\'s ministry meets during each adult service. Children learn and grow through large group teaching, crafts, stories, drama, and small group interaction.',
                'card_url_text' => 'About fpKids',
                'card_url'      => '/fpkids/',
                'card_link_id'  => 'to_fpKids_from_card'
        ],
        (object)[
                'card_title'    => 'Students',
                'card_image'    => 'images/fpstudents/worship-tall.jpg',
                'card_text'     => '6-12th grade students have a chance to grow closer to God and each other in a high-energy atmosphere that will change them each week.',
                'card_url_text' => 'About fpStudents',
                'card_url'      => '/fpstudents/',
                'card_link_id'  => 'to_fpStudents_from_card'
        ],
        (object)[
                'card_title'    => 'Worship',
                'card_image'    => 'images/worship/blount-worship-2-tall.jpg',
                'card_text'     => 'Our overall mission and purpose of the Worship Ministry of Faith Promise Church is to provide tools for engaging the hearts of men and women to the heart of God.',
                'card_url_text' => 'Worship',
                'card_url'      => '/worship/',
                'card_link_id'  => 'to_worship_from_card'
        ]
]);

?>

@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @videosection([
        'video' => '145143741',
        'title' => $campus->name . ' Campus',
        'class' => 'IntroSection--center',
        'buttons' => [
            [
                'title' => 'Receive Updates',
                'url' => 'http://faithpromise.us9.list-manage.com/subscribe?u=a2d18e426cb386730bf3010ca&id=37b27d5bb3&group[17705][8388608]=1'
            ]
        ]
    ])
    <p>We’re very excited to see our Loudon Campus launch in August of 2016, and we’re in the process of working out details for this location!</p>
    @endvideosection

    @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
    @endcardsection

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->name . ' Campus Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection