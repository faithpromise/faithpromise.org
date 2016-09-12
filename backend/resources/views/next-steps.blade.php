<?php

$cards = collect([
        (object)[
                'card_title'    => 'Next Steps Class',
                'card_image'    => 'images/pages/next-steps-tall.jpg',
                'card_text'     => 'Come meet some of our staff and learn about spiritual next steps as well as our vision and values. Childcare is available when you pre-register.',
                'card_url_text' => 'Times &amp; Register',
                'card_url'      => '/events/next-steps-class',
                'card_link_id'  => 'to_nextSteps_from_card'
        ],
        (object)[
                'card_title'    => 'Salvation',
                'card_image'    => 'images/pages/salvation-tall.jpg',
                'card_text'     => 'The most important spiritual step a person can take is to turn from their sins and commit their life to Jesus Christ. It\'s sometimes called being "saved" or "born again".',
                'card_url_text' => 'Learn More',
                'card_url'      => '/salvation/',
                'card_link_id'  => 'to_salvation_from_card'
        ],
        (object)[
                'card_title'    => 'Baptism',
                'card_image'    => 'images/pages/baptism-tall.jpg',
                'card_text'     => 'The Bible teaches that once a person is saved, his or her next step is to make that commitment to Jesus public through baptism.',
                'card_url_text' => 'Learn More',
                'card_url'      => '/baptism/',
                'card_link_id'  => 'to_baptism_from_card'
        ],
        (object)[
                'card_title'    => 'Giving',
                'card_image'    => 'images/pages/give-tall.jpg',
                'card_text'     => 'Our generosity breaks us free from our selfishness while also resourcing God\'s work through his church.',
                'card_url_text' => 'Learn More',
                'card_url'      => '/give/',
                'card_link_id'  => 'to_give_from_card'
        ],
        (object)[
                'card_title'    => 'Growing (Groups)',
                'card_image'    => 'images/pages/groups-tall.jpg',
                'card_text'     => 'At Faith Promise, we believe spiritual formation occurs primarily in the context of community.',
                'card_url_text' => 'Learn More',
                'card_url'      => '/groups/',
                'card_link_id'  => 'to_groups_from_card'
        ],
        (object)[
                'card_title'    => 'Serving',
                'card_image'    => 'images/pages/serve-tall.jpg',
                'card_text'     => 'As we volunteer our time and talents, we partner with God to make a difference in the world.',
                'card_url_text' => 'Get Involved',
                'card_url'      => '/serve/',
                'card_link_id'  => 'to_serve_from_card'
        ],
        (object)[
                'card_title'    => 'The Core',
                'card_image'    => 'images/general/the-core-tall.jpg',
                'card_text'     => 'This is the group of people who are completely sold out to the ministry of Faith Promise Church.',
                'card_url_text' => 'Learn More',
                'card_url'      => '/core/',
                'card_link_id'  => 'to_core_from_card'
        ]
]);

?>

@extends('layouts.page', ['title' => 'Next Steps'])

@section('page')

    @introsection(['title' => 'Next Steps', 'class' => ''])
    <p>One of the key things about our church is our obsession with spiritual growth. As a result, nearly every weekend experience will focus on one or more next steps.</p>
    <p>Below is a listing of key steps. Each of these items will take you to a page where you can learn more, take action, or get involved.</p>
    @endintrosection

    @cardsection(['title' => 'Take the Next Step', 'class' => 'Section--lightGrey', 'cards' => $cards])
    @endcardsection

    @cardsection(['title' => 'Upcoming Events', 'cards' => $ministry->Events])
    @endcardsection

    <!-- LATER: Need contact info here? -->
@endsection