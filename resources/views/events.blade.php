@extends('layouts.page', ['title' => 'Events'])

@section('page')

    @cardsection([
        'title' => 'Here\'s What\'s Happening',
        'class' => 'Section--lightGrey GridSection--center',
        'cards' => $events
    ])
    <p>There's a lot going on across our campuses at Faith Promise.</p>
    @endcardsection

    <div class="Section Section--center Section--lightGrey" style="padding-top: 0;">
        <div class="Section-container">
            <a id="to_calendar_from_events" class="Button" href="{{ route('calendar') }}">View the Full Calendar</a>
        </div>
    </div>

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need More Info?', 'text' => 'If you have questions about an event, we\'d love to help. Drop us a line at #email#.'])

@endsection