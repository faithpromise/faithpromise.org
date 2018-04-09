<?php

use Carbon\Carbon;

$camp_is_full = false;
$camp_cost = 250;
$early_bird_discount = 25;
$early_bird_last_day = Carbon::create(2017, 03, 14, 23, 59, 59, 'America/New_York');
$payment_plan_last_day = Carbon::create(2017, 6, 17, 23, 59, 59, 'America/New_York');

$depart_at = Carbon::create(2018, 6, 18, 0, 0, 0, 'America/New_York');
$return_at = Carbon::create($depart_at->year, $depart_at->month, 21, 18, 0, 0, 'America/New_York');

$registration_url = 'https://fpctystn.infellowship.com/Forms/375446';
$counselor_registration_url = 'https://fpctystn.infellowship.com/Forms/375513';
$waiting_list_url = 'https://fpctystn.infellowship.com/Forms/323477';
$photos_url = 'http://pix.sfly.com/PfRvGM3h';

$location = 'Fort Bluff Camp';
$location_city = 'Dayton, Tennessee';
$location_url = 'http://fortbluff.com/';

function camp_date_range(Carbon $depart_at, Carbon $return_at) {
    $str = $depart_at->format('F j') . '-';
    if ($depart_at->month !== $return_at->month) {
        return $str . $return_at->format('F j');
    }

    return $str . $return_at->format('j');
}

$faq = [
        (object)[
                'q' => 'What will my child do?',
                'a' => '<p>There are a ton of fun things to do at summer camp.  We’ve got swimming, a 250’ water slide, putt-putt, water trampoline, the blob, wacky games, wet games, crazy games, late night activities….and more!</p>'
        ],
        (object)[
                'q' => 'How will my child get there?',
                'a' => '<p>We will transport kids to and from camp by bus.  We will depart from the Pellissippi Campus ' . $depart_at->format('l') . ' morning, ' . $depart_at->format('F dS') . ' and return to the Pellissippi Campus the evening of Thursday, ' . $return_at->format('F dS') . '.</p>'
        ],
        (object)[
                'q' => 'Where will my child sleep?',
                'a' => '<p>In cabins with kids in your child’s small group and small group leader.  There will be as many as 5 small groups &amp; their leaders bunking in a cabin together.</p>'
        ],
        (object)[
                'q' => 'What will my child eat?',
                'a' => '<p>Yummy camp food... like chicken and potatoes, eggs and bacon and of course, snacks!  You can send your camper with additional money to spend at the General Store.</p>'
        ],
        (object)[
                'q' => 'How many leaders are going?',
                'a' => 'Campers will be in small groups with other kids of their gender and grade with a group leader.  Ratio approx. 10 kids/1 leader.  Other support leaders will be attending as well to help with games, events, etc.</p>'
        ],
        (object)[
                'q' => 'What if my child takes medication?',
                'a' => 'All medications will be distributed by the camp nurse or child’s small group leader.</p>'
        ],
        (object)[
                'q' => 'What if my child can’t swim?',
                'a' => 'All swim activities include licensed life guards who monitor the safety of the group.  Leaders will be present with kids at all times. If your child is not a proficient swimmer, swim vests are available. We highly recommend packing a personal, clearly labeled swim vest for your child to ensure the best fit.</p>'
        ],
        (object)[
                'q' => 'What if I need a scholarship?',
                'a' => 'Partial scholarships may be available on a case by case basis.  Each child must be registered first, before a scholarship request can be completed.  Once the registration process is complete, please contact your fpKids Campus Director for more information on how to pursue additional assistance.</p>'
        ],
        (object)[
                'q' => 'What will my child learn?',
                'a' => 'We will use a variety of group & individual activities to creatively teach your child these practical truths to deepen their faith and relationship with God.  As a parent, you will receive a tool that unpacks the daily scripture focus during camp week, how it can apply to your life and how you can apply it to your relationship with your child after camp week.</p>'
        ]
];

?>

@extends('layouts.page', ['title' => 'fpKids Camp', 'hero_image' => 'images/events/kids-camp-wide.jpg'])

@section('page')

    {{--
        ========================================
        Intro
        ========================================
    --}}
    @videosection(['title' => 'fpKids Summer Camp ' . $depart_at->format('Y'), 'video' => '195304413'])
    @if ($depart_at->isFuture())
    <p>
        <strong>{{ camp_date_range($depart_at, $return_at) }}</strong> &nbsp;|&nbsp; @if ($early_bird_last_day->isFuture()) <strong>${{ $camp_cost - $early_bird_discount }}</strong> (early bird) &nbsp;|&nbsp; <strong>${{ $camp_cost }}</strong> after {{ $early_bird_last_day->format('M j') }} @else <strong>${{ $camp_cost }}</strong> @endif
    </p>
    @endif
    @if ($payment_plan_last_day->isFuture())
        <p><em style="display:block; font-size: .85em;">Payment plan available until {{ $payment_plan_last_day->format('F j') }}.</em></p>
    @endif
    @if ($depart_at->isPast())
        <p>We return from Summer Camp on {{ $return_at->format('l, F d ') }} at {{ $return_at->format('g:i A') }}. Please join us at that time for a final celebration. For regular updates, videos and pictures, follow us on Facebook
            <a href="http://facebook.com/fpkids">facebook.com/fpkids</a>.</p>
    @elseif ($camp_is_full)
        <p>If you have questions about camp registration please call the fpKIDS office at 865-251-2590.</p>
    @else
        <p>Kids Camp is for rising 3rd to 6th grade (completed 2nd through 5th grade) and will happen at the amazing
            <a href="{{ $location_url }}" target="_blank">{{ $location }}</a> in {{ $location_city }}.</p>
        <p>
    @endif

    <p>
        @if ($depart_at->isPast())
            <a class="Button" href="{{ $photos_url }}">Camp Photos</a>
        @else
            @if (!$camp_is_full)
            <a class="Button" href="{{ $registration_url }}">Register Today!</a>
            @endif
            <a class="Button" href="{{ doc_url('fpkids/Camp-Rally-Documents.pdf') }}">Camper Documents</a>
        @endif
    </p>
    @endvideosection

    @bgsection([
        'title' => 'Scholarship Donations',
        'image' => 'images/fpkids/wall-signatures-tall.jpg',
        'class' => 'BackgroundSection--right',
        'buttons' => [
            [
                'title' => 'Donate Here',
                'url' => 'https://fpctystn.infellowship.com/Forms/357507'
            ]
        ]
    ])
    <p>We want every single kid to have a chance to attend fpKids Summer Camp. By donating any amount for scholarships, you are making it possible for one more kid to experience Jesus in an amazing new way. You will be a part of their story that God is telling by simply helping them attend!</p>
    @endbgsection

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
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/boys.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/volunteer-3.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/campfire.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/water-slide.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/games.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/water-bounce.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/games-2.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/golf.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/group.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/girls.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/pool.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/ring.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/volunteer-2.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/games-3.jpg">
        <img class="CampAlbum-photo lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/images/fpkids/camp/2015/volunteer-4.jpg">
    </div>

    {{--
        ========================================
        FAQ
        ========================================
    --}}
    @inlinecss
    <style type="text/css">
        .camp_faq {
            background-color: #F47B1D;
        / / Orange
            /*background-color: #0F3E38; // Turquoise*/
        }

        .camp_faq a:hover {
            background-color: #0F3E38;
            color:            #fff;
        }
    </style>
    @endinlinecss

    @faqsection(['faq' => $faq, 'class' => 'has-background camp_faq', 'image' => 'images/fpkids/camp/pattern-optimized.jpg'])
    @endfaqsection

    @if ($depart_at->isFuture())
        @bgsection(['title' => 'Counselors &amp; Support Staff', 'image' => '/images/fpkids/camp/volunteer-tall.jpg'])
        <p>We're so grateful to our amazing volunteers that make camp what it is. If you're volunteering for this year's camp, please apply here.</p>
        <p><a class="Button" href="{{ $counselor_registration_url }}">Apply Online</a></p>
        @endbgsection
    @endif

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['email' => 'fpkids@faithpromise.org', 'text' => 'If you have questions about fpKids Camp, please contact #email#'])

    {{--
        ========================================
        Staff
        ========================================
    --}}
    {{--@profilessection(['title' => 'Meet the fpKids Staff', 'class' => 'Section--lightGrey', 'profiles' => $ministry->Staff])--}}
    {{--@endprofilessection--}}

@endsection