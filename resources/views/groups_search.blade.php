@extends('layouts.default', ['title' => 'Groups Search'])

@section('content')

    <div class="GroupSearchLayout">

        <div class="GroupSearchLayout-results">

            <form class="GroupSearchForm">
                <div class="GroupSearchForm-field">
                    <span class="GroupSearchForm-label">Choose a Location</span>
                </div>
                <div class="GroupSearchForm-field">
                    <span class="GroupSearchForm-label">Group Type</span>
                </div>
                <div class="GroupSearchForm-field">
                    <span class="GroupSearchForm-label">Kids</span>
                </div>
                <div class="GroupSearchForm-field">
                    <input class="GroupSearchForm-byName" type="text">
                </div>
            </form>

            <div class="GroupSearchCard">
                <div class="GroupSearchCard-photoWrap">
                    <img class="GroupSearchCard-photo" src="{{ resized_image_url('images/staff/kyle-gilbert-square.jpg', 800, 'square') }}">
                </div>
                <div class="GroupSearchCard-content">
                    <div class="GroupSearchCard-main">
                        <div class="GroupSearchCard-about">
                            <h2 class="GroupSearchCard-title">Kyle &amp; Keri Gilbert</h2>
                            <p class="GroupSearchCard-description">Married couples & singles with or without kids are welcome. We have two young children who require childcare so we pay for and provide a babysitter Lorm ipsum means that its really importent for you to stay off drugs and stay in scool. You need to no things that will help you in life. Like MATHS and gym. You don't want to be dum.</p>
                        </div>
                        <div class="GroupSearchCard-actions">
                            <span class="GroupSearchCard-action">Details</span>
                            <span class="GroupSearchCard-action">Map</span>
                            <span class="GroupSearchCard-action">Hide This One</span>
                        </div>
                    </div>
                    <div class="GroupSearchCard-facts">
                        <div class="GroupSearchCard-fact">
                            <span class="GroupSearchCard-factValue">Knoxville</span>
                            <span class="GroupSearchCard-factLabel">14 miles away</span>
                        </div>
                        <div class="GroupSearchCard-fact">
                            <span class="GroupSearchCard-factValue">29</span>
                            <span class="GroupSearchCard-factLabel">avg age</span>
                        </div>
                        <div class="GroupSearchCard-fact">
                            <span class="GroupSearchCard-factValue">4-10</span>
                            <span class="GroupSearchCard-factLabel">kids ages</span>
                        </div>
                        <div class="GroupSearchCard-fact">
                            <span class="GroupSearchCard-factValue">Thurs</span>
                            <span class="GroupSearchCard-factLabel">weekly</span>
                        </div>
                        <div class="GroupSearchCard-fact">
                            <span class="GroupSearchCard-factValue">6:00PM</span>
                            <span class="GroupSearchCard-factLabel">start time</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="GroupSearchLayout-map">
            Map Here
        </div>

    </div>

@endsection