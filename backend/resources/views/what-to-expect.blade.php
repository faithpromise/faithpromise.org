<?php

// LATER: Put these in a central location. They're duplicated in other places. Search '$what_to_expect_cards'
$what_to_expect_cards = collect([
        (object)[
                'card_title'    => 'Children',
                'card_image'    => 'images/fpkids/logo-tall.jpg',
                'card_text'     => 'Our children\'s ministry meets during each adult service. Children learn and grow through large group teaching, crafts, stories, drama, and small group interaction.',
                'card_url_text' => 'About fpKids',
                'card_url'      => '/fpkids/',
                'card_link_id'  => 'to_fpkids_from_card'
        ],
        (object)[
                'card_title'    => 'Students',
                'card_image'    => 'images/fpstudents/worship-tall.jpg',
                'card_text'     => '6-12th grade students have a chance to grow closer to God and each other in a high-energy atmosphere that will change them each week.',
                'card_url_text' => 'About fpStudents',
                'card_url'      => '/fpstudents/',
                'card_link_id'  => 'to_fpstudents_from_card'
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

$faq = collect([
        (object)[
                'q' => 'What denomination is <span class="no-wrap">Faith Promise</span> Church?',
                'a' => '<p>Faith Promise Church is an autonomous, self-governing group. We have chosen to participate with other groups of churches for missions, evangelism and support. In this effort, we support missions individually and corporately. (For a listing of our core beliefs <a id="to_beliefs_from_whatToExpect" href="' . route('beliefs') . '">click here</a>.)</p>',
        ],
        (object)[
                'q' => 'Are the weekend services identical?',
                'a' => '<p>Yes. Each of the services features the same music and teaching. The only difference is that sign language interpretation is available on Saturdays at 6:00 pm at the Pellissippi campus.</p>'
        ],
        (object)[
                'q' => 'What should I wear?',
                'a' => '<p>Faith Promise is very casual. You\'ll find people in anything from jeans and t-shirts, shorts and flip-flops, to dresses and dress shirts. Wear whatever makes you the most comfortable.</p>'
        ],
        (object)[
                'q' => 'Which Bible translation does "Pastor Chris" Stephens use?',
                'a' => '<p>New American Standard</p>'
        ]
]);
?>

@extends('layouts.page', ['title' => 'What to Expect', 'hero_image' => 'images/general/invite-cards-wide.jpg'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @videosection([
        'title' => 'What To Expect',
        'video' => '151410291'
    ])
    <p>Faith Promise is a church with multiple locations, that exists to impact the unchurched of the world, starting with Knoxville, Tennessee, and the surrounding counties.</p>
    @endvideosection

    @cardsection(['cards' => $what_to_expect_cards, 'class' => 'Section--lightGrey'])
    @endcardsection

    @faqsection(['class' => '', 'faq' => $faq])
    @endfaqsection

@endsection
