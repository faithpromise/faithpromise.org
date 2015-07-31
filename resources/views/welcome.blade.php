@extends('layouts.default')

<?php $title = 'Join us for our current sermon series <span class="no-wrap">"' . $current_series->title . '"</span>'; ?>

@section('content')

    <div class="CurrentSeries">
        <div class="CurrentSeries-buttons">
            @if (! is_null($current_series->promo))
                <span class="CurrentSeries-button icon-play" ng-click="openVideo({{ $current_series->promo->vimeo_id }})"><span class="CurrentSeries-buttonText">Play Promo</span></span>
            @endif
            <a class="CurrentSeries-button icon-twitter" href="<?= share_twitter($current_series->url); ?>" title="Tweet"></a>
            <a class="CurrentSeries-button icon-facebook" href="<?= share_facebook($current_series->url); ?>" title="Share on Facebook"></a>
        </div>
    </div>

    <div class="SquareSection">
        <div class="SquareSection-container">
            <div class="Squares-grid">
                <div class="Squares-item">
                    <div class="Square Square--center NewHere">
                        <div class="Square-container">
                            <h2 class="Square-title">New to Faith Promise?</h2>
                            <p>It’s our desire for you to connect with God in a special way. We’d love to see you this weekend as we gather to worship together and grow in our relationship with Christ.</p>

                            <div class="Square-buttons">
                                <a class="Button Button-light" href="<?= route('whatToExpect'); ?>">What to Expect</a>
                                <br>
                                <a class="Button Button-light" href="<?= route('locations'); ?>">Times &amp; Locations</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Squares-item iCampusInfo" ng-controller="countdown">
                    <div
                            class="iCampusSquare b-lazy"
                            data-src-sm="<?= cdn_image('sm', 'full', 'images/general/girl-headphones-phone-square.jpg') ?>"
                            data-src-md="<?= cdn_image('md', 'half', 'images/general/girl-headphones-phone-square.jpg') ?>"
                            data-src-lg="<?= cdn_image('lg', 'half', 'images/general/girl-headphones-phone-square.jpg') ?>"
                            data-src="<?= cdn_image('xl', 'half', 'images/general/girl-headphones-phone-square.jpg') ?>">
                        <div class="iCampusSquare-container">

                            <h2 class="iCampusSquare-title">Watch Online</h2>
                            <p>Whether you’re checking us out for the first time or unable to attend this weekend, we want you to join us wherever you are. Participate with us in worship and live chat.</p>

                            <!-- Live -->
                            <div class="HomeLive" style="display: none;">
                                <img class="HomeLive-seriesImage" src="<?= cdn_image('sm', 'third', $current_series->image, 'square') ?>">
                                <a class="HomeLive-button">Watch Now</a>
                            </div>

                        </div>

                        <!-- Countdown -->
                        <div class="iCampusSquare-countdown">

                            <div class="grid grid-align-middle gutter-half">

                                <div class="grid-item 1/4">
                                    <img class="iCampusSquare-seriesImage" src="<?= cdn_image('sm', 'third', $current_series->image, 'square') ?>">
                                </div>

                                <div class="grid-item 3/4 iCampusSquare-timer" ng-cloak>
                                    <span class="iCampusSquare-digitWrap">
                                        <span class="iCampusSquare-digit" ng-bind="countdown.days" ng-show="countdown.isLoaded"></span>
                                        <span class="iCampusSquare-digit" ng-hide="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-label">dys</span>
                                    </span>
                                    <span class="iCampusSquare-separator">:</span>
                                    <span class="iCampusSquare-digitWrap">
                                        <span class="iCampusSquare-digit" ng-bind="countdown.hours" ng-show="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-digit" ng-hide="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-label">hrs</span>
                                    </span>
                                    <span class="iCampusSquare-separator">:</span>
                                    <span class="iCampusSquare-digitWrap">
                                        <span class="iCampusSquare-digit" ng-bind="countdown.minutes" ng-show="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-digit" ng-hide="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-label">min</span>
                                    </span>
                                    <span class="iCampusSquare-separator">:</span>
                                    <span class="iCampusSquare-digitWrap">
                                        <span class="iCampusSquare-digit" ng-bind="countdown.seconds" ng-show="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-digit" ng-hide="countdown.isLoaded">00</span>
                                        <span class="iCampusSquare-label">sec</span>
                                    </span>
                                    <p class="iCampusSquare-when">Join us online this Saturday at 6:00 pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @cardsection(['title' => 'Upcoming Events', 'cards' => $events])
    @endcardsection

@endsection
