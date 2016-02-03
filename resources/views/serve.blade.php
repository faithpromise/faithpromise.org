<?php

$opportunities = new stdClass();
$opportunities->card_title = 'Opportunities at Faith Promise';
// $opportunities->card_text = 'Ready to take the next step and begin serving at Faith Promise? Check out these opportunities.';
$opportunities->card_text = 'Ready to take the next step and begin serving at Faith Promise? Let us know!';
$opportunities->card_url = '/serve/opportunities';
// $opportunities->card_url_text = 'View Opportunities';
$opportunities->card_url_text = 'Contact Us';
$opportunities->card_image = 'images/pages/opportunities-tall.jpg';
$opportunities->card_link_id = 'to_opportunities_from_card';

$love_local = new stdClass();
$love_local->card_title = 'Serve Our Community';
$love_local->card_text = 'Opportunities abound for us to lend a hand, say a prayer, give a hug, and to be the hands and feet of God\'s love in our community.';
$love_local->card_url = '/love-local';
$love_local->card_url_text = 'Learn more';
$love_local->card_image = 'images/pages/love-local-tall.jpg';
$love_local->card_link_id = 'to_loveLocal_from_card';

$missions = new stdClass();
$missions->card_title = 'Short-Term Missions';
$missions->card_text = 'Each year our church plans multiple international mission trips. Check out these opportunities to serve internationally.';
$missions->card_url = '/missions';
$missions->card_url_text = 'Upcoming Trips';
$missions->card_image = 'images/pages/missions-tall.jpg';
$missions->card_link_id = 'to_missions_from_card';

$retirees = new stdClass();
$retirees->card_title = 'Projects for Retirees';
$retirees->card_text = 'We have ongoing, short-term opportunities for retirees with specialized skills.';
$retirees->card_url = 'https://docs.google.com/forms/d/1xw0_J0djgHZIr8NwBmiINzErY-e7Ond0LbCI6IfO-6s/viewform';
$retirees->card_url_text = 'Contact Us';
$retirees->card_image = 'images/general/retirees-tall.png';
$retirees->card_link_id = 'to_retirees_from_card';

$group_types = collect([$opportunities, $love_local, $missions, $retirees]);

?>

@extends('layouts.page', ['title' => 'Serving'])

@section('page')

    @cardsection(['title' => 'Get Involved', 'class' => 'Section--lightGrey', 'cards' => $group_types])
    <p>There is nothing more rewarding than using your time and skills to further the work of Jesus in the world. Check out the options below to find the best fit for you.</p>
    @endcardsection

    @textsection([
        'title' => 'Spiritual Gifts',
        'buttons' => [
            [
                'title' => 'Launch Gifts Inventory',
                'url' => 'https://gifts.churchgrowth.org/cgi-cg/gifts.cgi?intro=1'
            ]
        ]
    ])
    <p>Interested in taking a spiritual gifts inventory to gain insight into the way that God has gifted you for service?</p>

    @endtextsection

@endsection