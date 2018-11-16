<?php

use Carbon\Carbon;

$event_is_full = false;
$event_cost = 50;

$event_begin = Carbon::create(2018, 2, 23, 0, 0, 0, 'America/New_York');
$event_end = Carbon::create($event_begin->year, $event_begin->month, 25, 0, 0, 0, 'America/New_York');

//$event_begin = Carbon::create(2018, 2, 8, 0, 0, 0, 'America/New_York');
//$event_end = Carbon::create($event_begin->year, $event_begin->month, 10, 0, 0, 0, 'America/New_York');

$registration_url = 'https://fpctystn.infellowship.com/Forms/364760';

function event_date_range(Carbon $event_begin, Carbon $event_end)
{
    $str = $event_begin->format('F j') . '-';
    if ($event_begin->month !== $event_end->month) {
        return $str . $event_end->format('F j');
    }

    return $str . $event_end->format('j');
}

//$faq = [
//        (object)[
//                'q' => '',
//                'a' => ''
//        ]
//];

?>

@extends('layouts.page', ['title' => 'Fusion - fpStudents', 'hero_image' => 'images/events/fusion-wide.jpg'])

@section('page')

    {{--
        ========================================
        Intro
        ========================================
    --}}
    @introsection(['title' => 'Fusion Weekend ' . $event_begin->format('Y'), 'video' => '201307587'])
    @if ($event_begin->isFuture())
        <p>
            <strong>{{ event_date_range($event_begin, $event_end) }}</strong> &nbsp;|&nbsp;
            <strong>${{ $event_cost }}</strong>
        </p>
    @endif
    @if ($event_end->isPast())
        <p>Fusion 2018 has come to an end, but the passion our students have for Christ is burning brighter than ever! We pray that the relationships formed, and newness of God's spirit will impact them in a meaningful, lasting way and that they will be a light to those around them. Next year will be just as amazing, but until then, we'll see you on Wednesday nights at fpStudents!</p>
    @elseif ($event_begin->isPast())
        <p>We return from Fusion on {{ $event_end->format('l, F d ') }}.</p>
    @elseif ($event_is_full)
        <p>Fusion registration is now closed. If you have questions please contact us at <a href="mailto:fpsglobal@faithpromise.org">fpsglobal@faithpromise.org</a>.</p>
    @else
        <p>Fusion is an overnight weekend retreat for ALL students <span class="no-wrap">6th - 12th</span> grade that begins on Friday evening and ends on Sunday afternoon. Your local Host Home experience will involve small group time with fellowship and lots of fun. We will have live worship each night and learn together what God has for 2018.</p>
    @endif

    @if ($event_begin->isFuture() && !$event_is_full)
    <p>
        <a class="Button" href="{{ $registration_url }}">Register Today!</a>
    </p>
    @endif

    @if ($event_begin->isFuture())
        @include('students/_event_notice')
    @endif

    @endintrosection

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
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-01.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-03.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-02.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-04.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-05.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-08.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-06.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-07.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-14.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-09.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-13.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-10.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-12.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-11.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpstudents/fusion/fusion-15.jpg">
    </div>

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions about Fusion, please contact #email#'])

    {{--
        ========================================
        Staff
        ========================================
    --}}
    {{--@profilessection(['title' => 'Meet the fpStudents Staff', 'class' => 'Section--lightGrey', 'profiles' => $ministry->Staff])--}}
    {{--@endprofilessection--}}

@endsection