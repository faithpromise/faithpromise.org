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
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the Worship Team Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection