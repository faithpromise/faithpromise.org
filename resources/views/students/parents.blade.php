@extends('layouts.page', ['title' => 'Parent Guide'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Welcome Parents'])
    <p>fpStudents realizes that we are not the answer to discipling students…parents are! We are excited to get to partner with parents in ministering to their students, even in the midst of changing dynamics in their relationship with their students. The following is a list of resources that we encourage you as a parent to utilize to continue connecting with your student and help them grow in their faith.</p>
    <!-- TODO: Add social links -->
    @endintrosection

    @bgsection(
        [
            'title' => 'The Parent Resource',
            'image' => 'images/fpstudents/worship-2-wide.jpg',
            'buttons' => [
                [
                    'title' => 'Check it Out',
                    'url' => 'http://fpstudents.tumblr.com/'
                ]
            ]
        ]
    )
    <p>With each series we provide questions and ideas to spark discussion with your students that correspond with our weekly services.</p>
    @endbgsection

    {{--
    ================================================================================
        Serve
    ================================================================================ --}}

    @bgsection(['title' => 'Get Involved', 'image' => 'images/fpstudents/worship-2-wide.jpg'])
            <!-- TODO: Update text -->
    <p></p>
    <p><a class="Button" href="http://fpstudents.com">Learn more</a></p>
    @endbgsection

    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    {{--@profilessection(['title' => 'Meet the fpStudents Staff', 'profiles' => $ministry->Staff])--}}
    {{--@endprofilessection--}}

@endsection