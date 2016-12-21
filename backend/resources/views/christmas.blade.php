<?php

$og_image = url('images/series/christmas-at-the-movies-tall.jpg');

?>

@extends('layouts.default', ['title' => 'Christmas At The Movies', 'og_image' => $og_image])

@section('content')

    <div class="ChristmasSeries">
        <div class=" ChristmasSeries-content">
            <div class=" ChristmasSeries-videoContainer">
                <vimeo id="192190365"></vimeo>
            </div>
            <div class=" ChristmasSeries-shareContainer">
                <div class=" ChristmasSeries-shareLinks">
                    <span class=" ChristmasSeries-shareLink" facebook-share>
                      <i class=" ChristmasSeries-shareIcon icon-facebook"></i> Share on Facebook
                    </span>
                    <a class=" ChristmasSeries-shareLink ChristmasSeries-shareLink--twitter" href="https://twitter.com/intent/tweet?text=Grab+some+popcorn+and+find+a+seat%21+Our+new+sermon+series+%22Christmas+At+The+Movies%22+starts+Dec+3%2F4.&url=http://faithpromise.org/christmas">
                        <i class=" ChristmasSeries-shareIcon icon-twitter"></i> Share on Twitter
                    </a>
                </div>
            </div>
        </div>
    </div>

    @cardsection(['cards' => $posts, 'title' => 'Christmas at the Movies!', 'class' => 'Section--lightGrey'])
        <p>You don't want to miss the most fun-filled series of the year as look into a few Christmas favorites like Elf, The Polar Express, and The Grinch. Each weekend in December there's a new story to tell, so grab some popcorn, find a seat, and get ready to see these movies in a whole new light. Can't wait to see you there!</p>
        <p><strong>Series starts December 3rd/4th.</strong> See our <a href="{{ route('locations') }}">locations page</a> for specific service times and directions.</p>
    @endcardsection

@endsection