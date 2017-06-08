@extends('layouts.page', ['title' => 'Easter'])

@section('page')

    <div class="Hero-actions">
        <span class="Button BackgroundSection-button" facebook-share><i class="icon-facebook"></i> Share<span class="hide-on-mobile"> on Facebook</span></span>
        <a class="Button BackgroundSection-button" href="https://twitter.com/intent/tweet?text=Check out this %40faithpromise%20original%20movie%2C%20%22Wild%20Love.%22%20%23fpeaster&url=http://faithpromise.org/easter"><i class="icon-twitter"></i> Share<span class="hide-on-mobile"> on Twitter</span></a>
    </div>

    @videosection([
        'title' => 'Easter at Faith Promise',
        'video' => '209458417',
        'buttons' => [
            [
                'title' => 'Times &amp; Locations',
                'url' => '/locations'
            ]
        ]
    ])
    <p>This Easter, come experience our original short film, Wild Love — the story of a young man’s struggle against the struggles that surround him. When the wolves attack, he discovers that God will risk everything to rescue his sheep.</p>
    <p>Faith Promise Church invites you to come celebrate Easter with us at one of our locations from Wed, April 12 through Sun, April 16, as we learn about God’s wild and rescuing love!</p>
    @endvideosection

    <style>
        .CampAlbum {
            font-size: 0;
        }

        .CampAlbum-photo {
            width: 20%;
        }

        @media (max-width: 780px) {
            .CampAlbum > img:nth-child(n+7) {
                display: none;
            }

            .CampAlbum-photo {
                width: 33.3333%;
            }
        }
    </style>

    <div class="CampAlbum">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/1.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/2.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/3.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/4.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/5.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/6.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/7.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/8.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/9.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/easter/stills/10.jpg">
    </div>

    @cardsection(['cards' => $posts, 'class' => 'Section--lightGrey'])
    @endcardsection

@endsection