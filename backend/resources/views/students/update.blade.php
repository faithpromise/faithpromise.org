@extends('layouts.page', ['title' => $post->title, 'hero_image' => $post->image])

@section('page')

    @introsection(['title' => $post->title])
    @if(strlen($post->subtitle))
        <p class="text-center">
            <strong>{{ $post->subtitle }}</strong>
        </p>
    @endif
    {!! $post->description !!}

    @if ($post->type == 'event')
        @include('students/_event_notice')
    @endif

    @endintrosection

    @cardsection(['title' => 'Other Events &amp; Updates', 'class' => 'Section--lightGrey', 'cards' => $posts])
    @endcardsection

    <div class="Section Section--center Section--lightGrey" style="padding-top: 0;">
        <div class="Section-container">
            <a id="to_events_from_eventDetail" class="Button" href="{{ route('events') }}">View All Events &amp; Updates</a>
        </div>
    </div>

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need More Info?', 'email' => config('site.email'), 'text' => 'If you have questions about an event, we\'d love to help. Drop us a line at #email#.'])

@endsection