@extends('layouts.page', ['title' => 'New Short Term Groups', 'hero_image' => 'images/pages/studies-wide.jpg'])

@section('page')

    @if (count($studies) === 0)

        @introsection(['title' => '', 'class' => '', 'image' => ''])
        <p>There currently aren't any short term groups scheduled. However, we plan new short term groups periodically throughout the year.</p>
        <p>We'd love for you to <a id="to_groups_from_studiesIntro" class="no-wrap" href="{{ route('groups') }}">find a group</a> or attend our
            <a id="to_nextSteps_from_studiesIntro" class="no-wrap" href="{{ route('event', 'next-steps-class') }}">Next Steps Class</a>. You're always welcome to contact us if you have questions or need more information about groups at Faith Promise.
        </p>
        @endintrosection

    @else

        @cardsection(['title' => 'New Short Term Groups', 'cards' => $studies])
        <p>At Faith Promise we talk a lot about our small groups and how important they are. Our short term groups are the perfect place for you to get a feel for what small groups are like. We have great groups to choose from like men's groups, women's groups, groups on parenting, groups about marriage and more!</p>
        <p>Check out these new opportunities to plug into a short term group.</p>
        @endcardsection

    @endif

    @include('partials.have_questions', ['title' => 'Need Help or Want to Lead a Group?', 'contact' => 'Kelly Carringer', 'email' => 'kellyc@faithpromise.org', 'text' => 'If you have questions about a short term group or ways to get involved, please contact #email#.', 'class' => 'Section--lightGrey'])

@endsection