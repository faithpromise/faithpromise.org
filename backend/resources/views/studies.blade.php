@extends('layouts.page', ['title' => 'New Short Term Groups'])

@section('page')

    @if (count($studies) === 0)

        @introsection(['title' => '', 'class' => '', 'image' => ''])
        <p>There currently aren't any Bible studies scheduled. However, we plan new studies periodically throughout the year.</p>
        <p>We'd love for you to <a id="to_groups_from_studiesIntro" class="no-wrap" href="{{ route('groups') }}">find a group</a> or attend our
            <a id="to_nextSteps_from_studiesIntro" class="no-wrap" href="{{ route('event', 'next-steps-class') }}">Next Steps Class</a>. You're always welcome to contact us if you have questions or need more information about groups at Faith Promise.
        </p>
        @endintrosection

    @else

        @cardsection(['title' => 'New Short Term Studies', 'cards' => $studies])
        <p class="text-center">Check out these new opportunities to plug into a short term study!</p>
        @endcardsection

    @endif

    @include('partials.have_questions', ['email' => 'jenniferp@faithpromise.org', 'text' => 'If you have questions about a group or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection