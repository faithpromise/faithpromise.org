@extends('layouts.page', ['title' => $study->name, 'hero_image' => $study->image])

@section('page')

    @if ($study->has_description || $study->has_meta)
        @introsection(['title' => 'About This Study'])
        @if ($study->has_meta)
            <ul class="StudyMeta">
                @if ($study->gender == 'm')
                    <li>Men's Study</li>
                @endif
                @if ($study->gender == 'f')
                    <li>Women's Study</li>
                @endif
                @if (!empty($study->weeks))
                    <li>{{ $study->weeks }} weeks</li>
                @endif
                @if (!empty($study->cost))
                    <li>{{ $study->cost }}</li>
                @endif
            </ul>
        @endif
        {!! $study->description !!}
        @if ($study->session_length)  Each group time will be approximately {{ $study->session_length == 1 ? '1 hour' : $study->session_length . ' hours' }}. @endif Check individual times for childcare info.
        @endintrosection
    @endif

    @textsection(['title' => 'Times &amp; Registration', 'class' => 'Section--lightGrey'])

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

    @endtextsection

    @if(count($studies))

        @cardsection([
            'title' => 'Looking for something else?',
            'cards' => $studies
        ])
        <p class="text-center">Check out these other opportunities to plug into a small group study near you!</p>
        @endcardsection

        <div class="Section Section--center" style="padding-top: 0;">
            <div class="Section-container">
                <a id="to_studies_from_studyDetail" class="Button" href="{{ route('studies') }}">View All Studies</a>
            </div>
        </div>

    @endif

    @include('partials.have_questions', ['email' => 'KellyC@faithpromise.org', 'text' => 'If you have questions about a group or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection