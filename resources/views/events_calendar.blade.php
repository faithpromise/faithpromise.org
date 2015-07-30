@extends('layouts.page', ['title' => 'Calendar', 'hero_image' => 'images/pages/calendar-wide.jpg'])

@section('page')

    <div class="TextSection TextSection--compact">
        <div class="TextSection-container">

            <h2 class="TextSection-title text-center">
                @include('partials.calendar_nav')
            </h2>

            @foreach($days as $key => $events)

                <?php $day = \Carbon\Carbon::createFromFormat('Y-m-d', $key); ?>

                <h4 class="Calendar-heading">{{ $day->format('l, M j') }}</h4>

                <table class="Calendar">
                    <tbody>
                        @foreach($events as $event)
                            <tr class="Calendar-row">
                                <td class="Calendar-timeColumn">{{ $event->starts_at->format('g:i A') }}</td>
                                <td class="Calendar-titleColumn">{{ $event->title }}</td>
                                <td class="Calendar-locationColumn">{{ $event->location }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endforeach

            <div class="TextSection-title text-center">
            @include('partials.calendar_nav')
            </div>

        </div>
    </div>

@endsection