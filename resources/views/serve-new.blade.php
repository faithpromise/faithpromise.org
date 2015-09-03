<?php

$opportunities = new stdClass();
$opportunities->card_title = 'Opportunities at Faith Promise';
$opportunities->card_text = 'Ready to take the next step and begin serving at Faith Promise? Check out these opportunities.';
$opportunities->card_url = '/serve/opportunities';
$opportunities->card_url_text = 'View Opportunities';
$opportunities->card_image = 'images/pages/opportunities-tall.jpg';

$love_local = new stdClass();
$love_local->card_title = 'Serve Our Community';
$love_local->card_text = 'Opportunities abound for us to lend a hand, say a prayer, give a hug, and to be the hands and feet of God\'s love in our community.';
$love_local->card_url = '/love-local';
$love_local->card_url_text = 'Learn more';
$love_local->card_image = 'images/pages/love-local-tall.jpg';

$missions = new stdClass();
$missions->card_title = 'Short-Term Missions';
$missions->card_text = 'Each year our church plans multiple international mission trips. Check out these opportunities to serve internationally.';
$missions->card_url = '/missions';
$missions->card_url_text = 'Upcoming Trips';
$missions->card_image = 'images/pages/missions-tall.jpg';

$retirees = new stdClass();
$retirees->card_title = 'Projects for Retirees';
$retirees->card_text = 'We have ongoing, short-term opportunities for retirees with specialized skills.';
$retirees->card_url = '/retirees';
$retirees->card_url_text = 'Contact Us';
$retirees->card_image = 'images/general/retirees-tall.png';

$group_types = collect([$opportunities, $love_local, $missions, $retirees]);

?>

@extends('layouts.page', ['title' => 'Serving'])

@section('page')

    @cardsection(['title' => 'Get Involved', 'class' => 'Section--lightGrey', 'cards' => $group_types])
    <p>There is nothing more rewarding than using your time and skills to further the work of Jesus in the world. Check out the options below to find the best fit for you.</p>
    @endcardsection

    There are many opportunities to serve at Faith Promise. We want you to find the one that best suits your passion, personality, and availability. If you have already joined Faith Promise and are ready to serve, select one of the ministries below to get started.

@endsection