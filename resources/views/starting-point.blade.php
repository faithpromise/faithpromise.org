@extends('layouts.page', ['title' => 'Starting Point'])

@section('page')

    @videosection(['title' => 'Starting Point', 'class' => 'VideoSection--right', 'video' => '93449470'])
    <p>Starting Point is an accepting, conversational environment where people learn about God's story and their place in it. Starting Point helps participants explore the Bible and begin to understand key truths of the Christian faith.</p>
    @endvideosection

    @textsection(
        [
            'title' => 'Join Us',
            'class' => 'Section--lightGrey',
            'buttons' => [
                [
                    'title' => 'Check Times &amp; Register',
                    'url' => 'https://fpctystn.infellowship.com/GroupSearch/Show?category=16453'
                ]
            ]
        ])
        <p>With every journey there is always a Starting Point. Faith Promise wants to be at the Starting Point with you. </p>
        <p>If this sounds like you, then join us for this eight-week study. We will be waiting for you with some people who want to help you get started.</p>

    @endtextsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need more info?', 'email' => 'startingpointpellissippi@faithpromise.org', 'text' => 'For more information about Starting Point, group schedules, or to register for an upcoming Starting Point group, email us at #email#'])

@endsection