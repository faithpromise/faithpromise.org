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

$albums = collect([$onlyYou, $gloryIsBorn, $alive]);

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

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $ministry->Events])
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
                            <span class="Album-image b-lazy"
                                    data-src-sm="<?= cdn_image('sm', 'full', $album->image) ?>"
                                    data-src-md="<?= cdn_image('md', 'full', $album->image) ?>"
                                    data-src-lg="<?= cdn_image('lg', 'full', $album->image) ?>"
                                    data-src="<?= cdn_image('xl', 'half', $album->image) ?>"></span>
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