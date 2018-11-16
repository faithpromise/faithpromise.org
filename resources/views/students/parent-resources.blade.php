@extends('layouts.default', ['title' => 'Parent Resources'])

@section('content')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Parent Resources'])
    <p>The following is a list of resources that we encourage you as a parent to utilize to continue connecting with your student and help them grow in their faith.</p>
    <!-- TODO: Add social links -->
    @endintrosection

    @bgsection(
        [
            'title' => 'Parent Blog',
            'image' => 'images/general/mobile-user-wide.jpg',
            'buttons' => [
                [
                    'title' => 'Visit the Blog',
                    'url' => 'http://fpstudents.tumblr.com/'
                ]
            ]
        ]
    )
    <p>With each series we provide questions and ideas to spark discussion with your students that correspond with our weekly services.</p>
    @endbgsection


    {{--
    ================================================================================
        Books
    ================================================================================ --}}

    @cardsection(['title' => 'Recommended Books', 'class' => 'Section--lightGrey', 'cards' => $books])
    @endcardsection

@endsection