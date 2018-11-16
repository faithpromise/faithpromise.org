<?php

$onlyYou = (object)[
        'title' => 'Only You',
        'itunes' => 'https://itunes.apple.com/us/album/only-you/id987714819',
        'googleplay' => 'https://play.google.com/store/music/album/?id=Bhmxo6zb52blxwwp2jz7qc4tlqm',
        'amazon' => 'http://www.amazon.com/Only-You-Fpworship/dp/B00VN58YM2',
        'image' => 'images/worship/only-you-album-square.jpg'
];

$alive = (object)[
        'title' => 'Alive',
        'itunes' => 'https://itunes.apple.com/us/album/alive/id866125677',
        'googleplay' => null,
        'amazon' => null,
        'image' => 'images/worship/alive-album-square.jpg'
];

$gloryIsBorn = (object)[
        'title' => 'Glory Is Born - EP',
        'itunes' => 'https://itunes.apple.com/us/album/glory-is-born-ep/id947681294',
        'googleplay' => 'https://play.google.com/store/music/album/?id=Bomkef742kwqxga7754ib7psila',
        'amazon' => 'http://www.amazon.com/Glory-Born-Faith-Promise-Church/dp/B00QP60R2E',
        'image' => 'images/worship/glory-is-born-album-square.jpg'
];

$searchedTheSkies = (object)[
        'title' => 'Searched the Skies - Christmas EP',
        'itunes' => 'https://itunes.apple.com/us/album/searched-the-skies-ep/id1178372203',
        'googleplay' => 'https://play.google.com/store/music/album/?id=B6zp5rk4uvlbkt6mxr2y4umhply',
        'amazon' => 'https://www.amazon.com/dp/B01N65Y3X9/ref=cm_sw_r_cp_ep_dp_A5DpybP9STAWY',
        'image' => 'images/worship/searched-the-skies-album-square.jpg'
];

$albums = collect([$searchedTheSkies, $onlyYou, $gloryIsBorn, $alive]);

?>




@extends('layouts.page', ['title' => 'Worship Ministry'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Worship', 'class' => 'IntroSection--compact'])
    <p>The Worship Ministry of Faith Promise Church exists to create an atmosphere to connect people to God and influence life change.</p>
    @endintrosection

    {{--
    ================================================================================
        Events
    ================================================================================ --}}

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $ministry->Events, 'page' => 'worship'])
    @endcardsection

    {{--
    ================================================================================
        Albums
    ================================================================================ --}}

    <div class="AlbumSection">
        <div class="AlbumSection-container">
            <h2 class="AlbumSection-title">Worship Albums</h2>
            <ul class="Album-grid">
                @foreach($albums as $album)
                    <li class="Album-item">
                        <div class="Album">
                            <img class="Album-image" src="<?= resized_image_url($album->image, 800) ?>">
                            <div class="Album-buy">
                                <span class="Album-buyLabel">Available on:</span>
                                @if (!empty($album->itunes))
                                    <a class="Album-buyLink" href="{{ $album->itunes }}"><i class="icon-itunes"></i></a>
                                @endif
                                @if (!empty($album->googleplay))
                                    <a class="Album-buyLink" href="{{ $album->googleplay }}"><i class="icon-googleplay"></i></a>
                                @endif
                                @if (!empty($album->amazon))
                                    <a class="Album-buyLink" href="{{ $album->amazon }}"><i class="icon-amazon"></i></a>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the Worship Team Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection