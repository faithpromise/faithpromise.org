<?php

$choices = new stdClass();
$choices->card_title = 'Choices Resource Center';
$choices->card_text = 'Choices Resource Center is a life-affirming pregnancy center that helps individuals and families with unplanned pregnancies, sexual health issues, and post-abortion healing.';
$choices->card_url = 'http://choicesresource.com/';
$choices->card_url_text = 'Visit the Website';
$choices->card_image = 'images/missions/local/choices-resource-center.jpg';

$backyard = new stdClass();
$backyard->card_title = 'Operation Backyard';
$backyard->card_text = 'The Operation Backyard Minor Home Repair Program provides free home repairs for low-income families, and is about loving those families by using service projects as a means of entry into their lives to build a Christ-centered relationship between the volunteer groups and their homeowners.';
$backyard->card_url = 'http://klf.org/';
$backyard->card_url_text = 'Visit the Website';
$backyard->card_image = 'images/missions/local/operation-backyard.jpg';

$cards = collect([$choices, $backyard]);

?>


@extends('layouts.page', ['title' => 'Love Local'])

@section('page')

    @introsection(['title' => 'What it\'s About'])
    <p>We want to connect your group with local area ministries that impact our community and our world for Christ. Check out some of these opportunities and find out how you and your group can &quotLove Local&quot.</p>
    @endintrosection

    @bgsection(['title' => 'Kids Hope', 'class' => 'BackgroundSection--right', 'image' => 'images/missions/kids-hope-wide.jpg'])
    <p><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
    @endbgsection

    @textsection(['title' => 'Clothing Ministry', 'class' => '', 'image' => ''])
    <p><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
    @endtextsection

    @bgsection(['title' => 'Angel Tree', 'image' => 'images/missions/angel-tree-wide.jpg'])
    <p><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
    @endbgsection

    @cardsection(['title' => 'Opporutunities', 'cards' => $cards, 'class' => '', 'image' => ''])

    @endcardsection

    @textsection(['title' => 'Group Leaders', 'class' => '', 'image' => ''])
    <p>We'd love to hear how you're group is shining a light in our community. Let us know that you're group is serving and be sure to share your stories of how lives are being changed for God's glory.</p>
    @endtextsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need more info?', 'email' => 'startingpointpellissippi@faithpromise.org', 'text' => 'For more information about Starting Point, group schedules, or to register for an upcoming Starting Point group, email us at #email#'])

@endsection