<!-- PAGE: add content -->

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
        Serve
    ================================================================================ --}}

    @bgsection([
        'title' => 'Join Our Team',
        'class' => 'get_involved',
        'image' => 'images/fpkids/rocket-wide.jpg',
        'buttons' => [
            [
                'title' => 'Learn more',
                'url' => '/worship'
            ]
        ]
    ])
    <p>We're so glad to have you as our guest at Faith Promise. We want your experience in fpKIDS to be one worth talking about. Please visit our welcome page designed just for you.</p>
    @endbgsection

    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the Worship Team Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection