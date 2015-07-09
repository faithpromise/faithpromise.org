<?php



?>

@extends('layouts.page', ['title' => 'Missions'])

@section('page')

    <!--TODO: Confirm missionary areas-->
    <!--TODO: Hero image - missions -->
    <!--TODO: Finish content-->

    <div class="IntroSection">
        <div class="IntroSection-container">
            <h1 class="IntroSection-title">Faith Promise Missions</h1>

            <div class="IntroSection-text">
                <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
                <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
            </div>
        </div>
    </div>

    <div class="GridSection Section--lightGrey">
        <div class="GridSection-container">
            <h2 class="GridSection-title">Upcoming Trips</h2>
            @if (count($trips))
            <ul class="Card-grid" card-grid>
                @foreach($trips as $trip)
                    <li class="Card-item">
                        @include('partials.card', ['title' => (! is_null($trip->missionlocation) ? $trip->missionlocation->name : $trip->title), 'subtitle' => $trip->dates, 'image' => '', 'text' => '', 'url' => (! is_null($trip->missionlocation) ? $trip->missionlocation->getUrl() : null), 'url_text' => ''])
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div class="TextSection TextSection--center">
        <div class="TextSection-container">
            <div class="TextSection-title">Get Updates</div>
            <div class="TextSection-text">
                <p>Sign up for email notifications and we'll let you know when new trips are planned.</p>
                <a class="Button">Sign Up</a>
                <!--TODO: Get url for missions updates-->
            </div>
        </div>
    </div>

    <div class="StaffSection Section--lightGrey">
        <div class="StaffSection-container">
            <h2 class="StaffSection-title">Missionaries</h2>
            <ul class="StaffSection-grid">
                @foreach($missionaries as $missionary)
                <li class="StaffSection-item">
                    <a class="StaffSection-card" href="{{ $missionary->url }}">
                        <span class="StaffSection-photo" style="background-image:url('{{ $missionary->getThumbnail() }}');"></span>
                        <span class="StaffSection-name">{{ $missionary->name }}</span>
                        <span class="StaffSection-staffTitle">{{ ! is_null($missionary->missionlocation) ? $missionary->missionlocation->name : '' }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="GridSection">
        <div class="GridSection-container">
            <div class="GridSection-title">Serving our Community</div>
            KidsHope, Clothing ministry, Angel Tree
        </div>
    </div>

    @include('partials.staff_gallery', ['staff' => $staff, 'title' => 'Meet the fpKids Staff', 'class' => 'Section--lightGrey'])
    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you still have questions about a trip or ways to get involved, please contact'])

@endsection