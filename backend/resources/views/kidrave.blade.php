<?php

// LATER: We need to use the calendar_events to show a list of classes and links to register
$registration = [
        'anderson'    => 'https://fpctystn.infellowship.com/Forms/281315',
        'blount'      => '',
        'campbell'    => '',
        'north'       => '',
        'pellissippi' => ''
];

?>

@extends('layouts.page', ['title' => 'KidRAVE'])

@section('page')

    @introsection([
    'title' => 'Kids Leading Kids to Worship',
        'buttons' => [
            [
                'title' => 'Practice Videos',
                'url' => 'https://vimeo.com/album/3863224'
            ]
        ]])
    <p>Hey Parents! We are so proud of our KidRavers. In efforts to make practice even easier for them (and you!) we are starting a new approach to practicing. Starting August 1st, physical copies of KidRave DVDs will only be made upon request. Instead a digital version will be offered. All you need to do is click the &quot;Practice Videos&quot; button below and enter the password: &quot;Kidrave16&quot; and that’s it! You will be taken to a playlist that contains all lyric videos and motions for your child to practice. It is important to note that registration for KidRave for the 2016-2017 school year will be available in July. On August 1st, the password for the digital practice videos will be reset to a new password that will be emailed to you once you register your child as a 2016-2017 KidRave participant. We are so excited for what we have planned for this upcoming year and we hope that you will be too! If you have any questions or need to request a physical copy, please contact your campus fpKIDS Director.</p>
    @endintrosection

@endsection