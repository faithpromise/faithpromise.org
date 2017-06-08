<?php

use Carbon\Carbon;
use VTalbot\Markdown\Facades\Markdown;

/**
 * @param Carbon $starts_at
 * @return string
 */
function series_begins_message(Carbon $starts_at) {

    $today = Carbon::today()->startOfDay();
    $diff_in_days = $today->diffInDays($starts_at, false);

    // Series started today
    if ($diff_in_days === 0) {
        return 'Series Begins Today!';
    }

    // 6 days away (it's Sunday before it starts (on Saturday)
    if ($diff_in_days < 6) {
        return 'Series Begins This Weekend';
    }

    // More than a week away
    return 'Series Begins ' . $starts_at->format('F j');

}

?>

@extends('layouts.page', [
    'title' => $series->title,
    'hero_image' => $series->image,
    'og_image' => cdn_image_raw($series->image, 'tall'),
    'og_type' => 'article'
])

@section('page')

    <div class="SubHeader">
        <div class="SubHeader-container">
            <div class="SubHeader-title">
                Series - {{ $series->title }}
            </div>
            <div class="SubHeader-share">
                Share series on:
                <span class="SubHeader-shareLink" facebook-share="{{ $series->url }}">Facebook</span> &amp;
                <a class="SubHeader-shareLink" href="{{ $series->twitter_share_url }}">Twitter</a>
            </div>
        </div>
    </div>

    @if ($series->description)
        @textsection(['title' => 'About This Series'])
            {!! Markdown::string($series->description) !!}
        @endtextsection
    @endif

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
                <div class="SeriesList-description">{!! Markdown::string($v->description) !!}</div>
            </div>
            <div class="SeriesList-actions">
                @if ($v->vimeo_id)
                    <a class="SeriesList-action" open-video="{{ $v->id }}"><i class="icon-play"></i> Watch Video</a>
                @endif
                @if ($v->audio_url)
                    <a class="SeriesList-action" href="{{ $v->audio_url }}" target="_blank"><i class="icon-headphones"></i> Listen to Audio</a>
                @endif

                <a class="SeriesList-action" facebook-share="{{ $v->url }}"><i class="icon-facebook"></i> Post to Facebook</a>
                <a class="SeriesList-action" href="{{ $v->twitter_share_url }}"><i class="icon-twitter"></i> Tweet</a>

                {{--<a class="SeriesList-action"><i class="icon-share"></i> Share Sermon</a>--}}
                @if ($v->has_resources)
                    <a class="SeriesList-action" open-video-resources="{{ $v->id }}"><i class="icon-docs"></i> Resources</a>
                @endif
            </div>
        </div>
    @endforeach
</div>

@if ($series->starts_at->isToday() || $series->starts_at->isFuture())
    <div class="SeriesBlank">
        <h2 class="SeriesBlank-title">{{ series_begins_message($series->starts_at) }}</h2>
        <a class="Button" href="{{ route('locations') }}">Find a Location</a>
    </div>
@endif

@if ($alignment_resources->count())

    @if (asset_exists('images/alignments/' . $series->slug . '/book-cover.jpg'))
        <div class="SeriesAlignment">
            <div class="SeriesAlignment-container">
                <div class="SeriesAlignment-content">
                    <h2 class="SeriesAlignment-title">Group Alignment</h2>
                    <p class="SeriesAlignment-text">
                        During an alignment, groups focus on studying and discussing the same topics presented in the weekend services. This allows our entire church to come together and grow in our relationship with Christ and with one another. It's a perfect time to get in a group if you aren't in one already. To learn more about groups, visit our
                        <a class="no-wrap" href="{{ route('groups') }}">groups page</a> or get in touch with us after any service at our Next Steps area.
                    </p>
                    <p>
                        <a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7079&weekday=&start_time=">Find a Group</a>
                    </p>
                </div>
                <div class="SeriesAlignment-book">
                    <img class="SeriesAlignment-image" src="{{ cdn_image_raw('images/alignments/' . $series->slug . '/book-cover.jpg') }}">
                </div>
            </div>
        </div>
    @endif

    <div class="SeriesResources">
        <div class="SeriesResources-container">
            <h2 class="SeriesResources-title">Group Resources</h2>
            <p class="SeriesResources-text">We've created the following resources for you and your group to help guide discussion during this alignment.</p>
            <div class="SeriesResourceList">
                @foreach($series->alignmentResources as $resource)
                    <a class="SeriesResourceList-item" href="{{ $resource->url }}">
                        <img class="SeriesResourceList-image" src="{{ resized_image_url($resource->image, 800, 'tall') }}">
                        <span class="SeriesResourceList-title">{{ $resource->title }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endif

@endsection