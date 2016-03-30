<?php

$og_image = url('images/series/after-the-fall-tall.jpg');

?>

@extends('layouts.default', ['title' => 'Easter', 'og_image' => $og_image])

@section('content')

    <div class="AfterTheFall">
        <div class="AfterTheFall-content">
            <div class="AfterTheFall-videoContainer">
                <div class="VideoPlayer">
                    <iframe src="https://www.youtube.com/embed/cdgaTG_mYmY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="AfterTheFall-shareContainer">
                <div class="AfterTheFall-shareLinks">
                    <span class="AfterTheFall-shareLink" facebook-share>
                      <i class="AfterTheFall-shareIcon icon-facebook"></i> Share on Facebook
                    </span>
                    <a class="AfterTheFall-shareLink" href="https://twitter.com/intent/tweet?text=Sneak%20peak%20of%20%40faithpromise%20original%20movie%2C%20%22After%20the%20Fall.%22%20%23fpeaster&url=http://faithpromise.org/easter">
                        <i class="AfterTheFall-shareIcon icon-twitter"></i> Share on Twitter
                    </a>
                </div>
            </div>
        </div>
    </div>

    @cardsection(['cards' => $posts, 'class' => 'Section--lightGrey'])
    @endcardsection

@endsection