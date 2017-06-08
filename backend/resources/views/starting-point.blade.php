@extends('layouts.page', ['title' => 'Starting Point'])

@section('page')

    @videosection(['title' => 'Starting Point', 'class' => 'VideoSection--right', 'video' => '93449470'])
    <p>Starting Point is an accepting, conversational environment where people learn about God's story and their place in it. Starting Point helps participants explore the Bible and begin to understand key truths of the Christian faith.</p>
    @endvideosection

    @textsection(
        [
            'title' => 'Join Us',
            'class' => 'Section--lightGrey'
        ])
        <p>With every journey there is always a Starting Point. Faith Promise wants to be at the Starting Point with you. </p>
        <p>If this sounds like you, then join us for this eight-week study. We will be waiting for you with some people who want to help you get started.</p>

        @if (count($times))

            <table class="StudiesTable">
                <thead>
                    <tr>
                        <th>Campus</th>
                        <th class="StudiesTable-leader">Leader</th>
                        <th>Time</th>
                        <th>Childcare</th>
                        <th>Register</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($times as $time)
                        <tr>
                            <td>
                                {{ $time->campus->name }} @if (!empty($time->room))
                                    <span class="StudiesTable-meta">{{ $time->room }}</span>@endif
                            </td>
                            <td class="StudiesTable-leader" title="{{ $time->leader }}">{{ $time->leader }}</td>
                            <td>
                                {{ $time->starts_at->format('D') }} {{ $time->starts_at->format('g:i A') }}
                                <span class="StudiesTable-meta">Starts {{ $time->starts_at->format('M j') }}</span>
                            </td>
                            <td class="StudiesTable-childcare">{{ $time->has_childcare ? 'Provided' : 'None' }}</td>
                            <td>
                                @if ($time->is_full)
                                    Class is full
                                @elseif ($time->registration_url)
                                    <a href="{{ $time->registration_url }}">Register</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    @endtextsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    <!-- TODO: This doesn't make sense - limited to Pel -->
    @include('partials.have_questions', ['title' => 'Need more info?', 'email' => 'startingpointpellissippi@faithpromise.org', 'text' => 'For more information about Starting Point, group schedules, or to register for an upcoming Starting Point group, email us at #email#'])

@endsection