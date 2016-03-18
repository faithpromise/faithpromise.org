<?php
    /** @var \FaithPromise\Shared\Models\Series $series */

    $twitter_text = 'Check out this @' . config('site.twitter') . ' series: ' . $series->title;
    $twitter_url = 'https://twitter.com/intent/tweet?text=' . urlencode($twitter_text) . '&url=' . $series->url;
?>

@extends('layouts.page', [
    'title' => $series->title,
    'hero_image' => $series->image,
    'og_image' => cdn_image_raw($series->image, 'tall'),
    'og_type' => 'article'
])

@section('page')

    <div class="SubHeader">
        <div class="SubHeader-title">
            Series - {{ $series->title }}
        </div>
        <div class="SubHeader-share">
            Share series on: <span class="SubHeader-shareLink" facebook-share="{{ $series->url }}">Facebook</span> &amp;
            <a class="SubHeader-shareLink" href="{{ $twitter_url }}">Twitter</a>
        </div>
    </div>

    <div class="SeriesList">
        @foreach($videos as $v)
            <div class="SeriesList-item">
                <div class="SeriesList-imageWrap">
                    <picture>
                        <source
                                media="(min-width: 1200px)"
                                srcset="
                                http:<?= resized_image_url($series->image, 1920, 'tall') ?> 1920w,
                                http:<?= resized_image_url($series->image, 1680, 'tall') ?> 1680w,
                                http:<?= resized_image_url($series->image, 1280, 'tall') ?> 1280w,
                                http:<?= resized_image_url($series->image, 800, 'tall') ?> 800w,
                                http:<?= resized_image_url($series->image, 480, 'tall') ?> 480w
                            "
                                sizes="30vw">
                        <source
                                srcset="
                                http:<?= resized_image_url($series->image, 1280, 'square') ?> 1280w,
                                http:<?= resized_image_url($series->image, 800, 'square') ?> 800w,
                                http:<?= resized_image_url($series->image, 480, 'square') ?> 480w
                            "
                                sizes="30vw">
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="{{ $series->title }} Sermon Series Graphic">
                    </picture>
                </div>
                <div class="SeriesList-info">
                    <h3 class="SeriesList-title">{{ $v->title }}</h3>
                    <p class="SeriesList-meta">
                        @if ($v->speaker_display_name)
                            <span class="SeriesList-speaker">{{ $v->speaker_display_name }}</span>
                        @endif
                        @if ($v->sermon_date)
                            <span class="SeriesList-date">{{ $v->sermon_date_formatted }}</span>
                        @endif
                    </p>
                    <p class="SeriesList-description">{{ $v->description }}</p>
                </div>
                <div class="SeriesList-actions">
                    @if ($v->vimeo_id)
                        <a class="SeriesList-action" open-video="{{ $v->id }}"><i class="icon-play"></i> Watch Video</a>
                    @endif
                    @if ($v->audio_file)
                        <a class="SeriesList-action" href="{{ $site['audio_url'] }}{{ $v->audio_file }}" target="_blank"><i class="icon-headphones"></i> Listen to Audio</a>
                    @endif
                    <a class="SeriesList-action"><i class="icon-share"></i> Share Sermon</a>
                    {{--<a class="SeriesList-action">Group Study</a>--}}
                </div>
            </div>
        @endforeach
    </div>

    <div class="SeriesBlank">
        <h2 class="SeriesBlank-title">Series Begins April 2</h2><!-- TODO: Replace hard coded date -->
        <a class="Button" href="{{ route('locations') }}">Find a Location</a>
    </div>

@endsection