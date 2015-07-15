<!-- TODO: replace hero image -->
@extends('layouts.page', ['title' => 'Calendar', 'hero_image' => '/build/images/worship/jesus-wide.jpg'])

@section('page')

    <div class="TextSection TextSection--compact">
        <div class="TextSection-container">
            <h2 class="TextSection-title text-center">{{ $start->format('F Y') }} Calendar</h2>

            @foreach($days as $key => $events)

                <?php $day = \Carbon\Carbon::createFromFormat('Y-m-d', $key); ?>

                <h4>{{ $day->format('l, M jS') }}</h4>

                <table>
                    <tbody>

                        @foreach($events as $event)

                            <tr>
                                <td>{{ $event->starts_at->format('g:i A') }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->location }}</td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @endforeach

        </div>
    </div>

@endsection