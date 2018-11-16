@extends('layouts.default', ['title' => 'Welcome Parents'])

@section('content')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Welcome Parents'])
    <p>fpStudents realizes that we are not the answer to discipling students... parents are! We are excited to get to partner with parents in ministering to their students, even in the midst of changing dynamics in their relationship with their students.</p>
    <!-- TODO: Add social links -->
    @endintrosection

    @bgsection(
        [
            'title' => 'Parent Resources',
            'image' => 'images/general/steps-wide.jpg',
            'buttons' => [
                [
                    'title' => 'View Resources',
                    'url' => route('fpStudents_parentResources')
                ]
            ]
        ]
    )
    {{--<p>With each series we provide questions and ideas to spark discussion with your students that correspond with our weekly services.</p>--}}
    <p>We encourage you as a parent to take advantage of these resources to connect with your student and help them grow in their faith.</p>
    @endbgsection


    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the fpStudents Staff', 'profiles' => $staff])
    @endprofilessection

    {{--
    ================================================================================
        Serve
    ================================================================================ --}}

    @bgsection(
        [
            'title' => 'Get Involved',
            'class' => 'BackgroundSection--right',
            'image' => 'images/fpstudents/worship-wide.jpg',
            'buttons' => [
                [
                    'title' => 'Contact Jeff',
                    'url' => route('staff', 'jeff-cochran')
                ]
            ]
        ])
            <!-- TODO: Update text -->
    <p>There's no better way to tell your student how important church is than by getting involved. You can support our students as a greeter, snack volunteer, crowd control, group leader, tech, and more.</p>
    @endbgsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions we\'d love to hear from you. Please contact us at #email#'])

@endsection