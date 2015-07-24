<!-- IMAGE: replace hero image -->
@extends('layouts.page', ['title' => 'Calendar', 'hero_image' => 'images/worship/jesus-wide.jpg'])

@section('page')

    <div class="TextSection TextSection--compact">
        <div class="TextSection-container">
            <h2 class="TextSection-title text-center">
                @if ($allow_prev)
                    <a class="Calendar-nav" href="{{ $prev_url }}"><i class="icon-left-open-big"></i></a>
                @else
                    <span class="Calendar-nav is-disabled"><i class="icon-left-open-big"></i></span>
                @endif
                {{ $start->format('F Y') }} Calendar
                @if ($allow_next)
                    <a class="Calendar-nav" href="{{ $next_url }}"><i class="icon-right-open-big"></i></a>
                @else
                    <span class="Calendar-nav is-disabled"><i class="icon-right-open-big"></i></span>
                @endif
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

        </div>
    </div>

@endsection