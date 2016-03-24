<?php

// LATER: We need to use the calendar_events to show a list of classes and links to register
$registration = [
    'anderson' => 'https://fpctystn.infellowship.com/Forms/281315',
    'blount' => '',
    'campbell' => '',
    'north' => '',
    'pellissippi' => ''
];

?>

<!-- IMAGE: Need new header image -->
@extends('layouts.page', ['title' => 'KidRAVE'])

@section('page')

    @introsection(['title' => 'Kids Leading Kids to Worship'])
    <p>KidRAVE is designed for elementary age kids who like to move for God.</p>
    <p>KidRAVE is vital to our belief that kids make great worshipers. KidRAVE provides kids the opportunity to lead worship during fpKIDS weekend services & special events during the year.  Rehearsals are filled with fun, laughs, movement, and a focus on worship.</p>
    <p>KidRAVE members are expected to attend rehearsals and one hour of fpKIDS each week. (Rehearsal times are specific to each campus.)  KidRAVE members should wear their KidRAVE t-shirt each week and be ready with lots of energy.</p>
    @endintrosection

    @textsection(['title' => 'Registration', 'class' => 'Section--lightGrey'])
        <p>The cost for your child to participate in KidRave is $10 per year.  Your child will receive a KidRave t-shirt (annually), access to all of the worship songs / motions, weekly rehearsals and a party at the end of the school year to celebrate all that God has done.</p>
        <p>To register, please use the link for your campus.</p>
        <ul>
            <li><a href="https://fpctystn.infellowship.com/Forms/281315">Anderson</a></li>
            <li><a href="https://fpctystn.infellowship.com/Forms/281317">Blount</a></li>
            <li><a href="https://fpctystn.infellowship.com/Forms/281403">Campbell</a></li>
            <li><a href="https://fpctystn.infellowship.com/Forms/281322">North Knox</a></li>
            <li><a href="https://fpctystn.infellowship.com/Forms/278377">Pellissippi</a></li>
        </ul>
    @endtextsection

@endsection