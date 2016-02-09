@extends('layouts.page', ['title' => $event->title, 'hero_image' => $event->image])

@section('page')

    @introsection(['title' => $event->title])
    @if(strlen($event->subtitle))
        <p class="text-center">
            <strong>{{ $event->subtitle }}</strong>
        </p>
    @endif
    {!! $event->description !!}
    @endintrosection

    @cardsection(['title' => 'Other Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

    <div class="Section Section--center Section--lightGrey" style="padding-top: 0;">
        <div class="Section-container">
            <a id="to_events_from_eventDetail" class="Button" href="{{ route('events') }}">View All Events</a>
        </div>
    </div>

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need More Info?', 'text' => 'If you have questions about an event, we\'d love to help. Drop us a line at #email#.'])

@endsection