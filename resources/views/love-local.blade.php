<?php

$ccc = new stdClass();
$ccc->card_title = 'Campbell County Children\'s Center';
$ccc->card_text = 'The mission of the Campbell County Children’s Center is to reduce the traumatization of the child abuse victims and their families.';
$ccc->card_url = 'http://www.campbellcountychildrenscenter.org';
$ccc->card_url_text = 'Visit the Website';
$ccc->card_image = 'images/missions/local/choices-resource-center.jpg';

$choices = new stdClass();
$choices->card_title = 'Choices Resource Center';
$choices->card_text = 'Choices Resource Center is a life-affirming pregnancy center that helps individuals and families with unplanned pregnancies, sexual health issues, and post-abortion healing.';
$choices->card_url = 'http://choicesresource.com';
$choices->card_url_text = 'Visit the Website';
$choices->card_image = 'images/missions/local/choices-resource-center.jpg';

$backyard = new stdClass();
$backyard->card_title = 'Operation Backyard';
$backyard->card_text = 'The Operation Backyard Minor Home Repair Program provides free home repairs for low-income families, and is about loving those families by using service projects as a means of entry into their lives to build a Christ-centered relationship between the volunteer groups and their homeowners.';
$backyard->card_url = 'http://klf.org';
$backyard->card_url_text = 'Visit the Website';
$backyard->card_image = 'images/missions/local/operation-backyard.jpg';

$cards = collect([$ccc, $choices, $backyard]);

?>


@extends('layouts.page', ['title' => 'Love Local'])

@section('page')

    @introsection(['title' => 'What\'s it About?'])
    <p>Faith Promise is engaging the world around us to share the hope of Christ in tangible ways.  Below you will find several opportunities to serve our community.</p>
    @endintrosection

    @bgsection(
        [
            'title' => 'Kids Hope USA',
            'class' => 'BackgroundSection--right',
            'image' => 'images/missions/kids-hope-wide.jpg',
            'buttons' => [
                [
                    'title' => 'Learn More',
                    'url' => route('kidsHope')
                ]
            ]
        ]
    )
    <p>Our partnership with Kids Hope USA is making a huge impact in the lives of kids (and their mentors) through one-on-one mentoring.</p>
    @endbgsection

    @textsection(['title' => 'Clothing Ministry', 'class' => '', 'image' => ''])
    <p>Help provide clothes to people in Knoxville who are in need.  Our year-round donation container is located in the gravel area in the back parking lot of the Faith Promise Pellissippi Campus.  It is directly to the left of the main trailer door.  Clothing is collected every weekend, sorted and then distributed to a mixture of FP members and local ministries.  In-season clothes are most helpful - especially jeans,  tennis shoes, coats, socks, and underwear.  If you would like to donate or help serve in this ministry, please email <a href="mailto:fpclothes@gmail.com">fpclothes@gmail.com</a>.</p>
    @endtextsection

    @bgsection(['title' => 'Angel Tree', 'image' => 'images/missions/angel-tree-wide.jpg'])
    <p><!-- TODO: change text -->Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
    @endbgsection

    @cardsection(['title' => 'Opporutunities', 'cards' => $cards, 'class' => '', 'image' => ''])

    @endcardsection

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you have questions or need help getting started with Love Local, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection