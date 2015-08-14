@extends('layouts.page', ['title' => $event->title, 'hero_image' => $event->image])

@section('page')

    @introsection(['title' => $event->title])
        {!! $event->description !!}
    @endintrosection

    @cardsection(['title' => 'Other Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

    <div class="Section Section--center Section--lightGrey" style="padding-top: 0;">
        <div class="Section-container">
            <a class="Button" href="{{ route('events') }}">View All Events</a>
        </div>
    </div>

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need More Info?', 'text' => 'If you have questions about an event, we\'d love to help. Drop us a line at #email#.'])

@endsection