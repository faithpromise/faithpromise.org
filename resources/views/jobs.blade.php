@extends('layouts.page', ['title' => 'Join Our Team'])

@section('page')

    @introsection([
        'title' => 'Join Our Team'
    ])
    @if ($jobs->count())
        <p>Interested in joining the staff team of the fastest-growing church in East Tennessee? See an opportunity below where you could put your expertise to work to help move our church to the next level? If so, we'd love to hear from you.</p>
    @else
        <p>There are currently no openings at this time, but check back again because we are always looking for great talent!</p>
    @endif
    <p style="text-align: center"><img style="width:6.25em" src="{{ cdn_image_raw('images/general/best-christian-workplace.png') }}"></p>
    @endintrosection

    @cardsection(['title' => 'Current Opportunities', 'class' => 'Section--lightGrey', 'cards' => $jobs])
    @endcardsection

    @include('partials.have_questions', ['email' => 'marthaw@faithpromise.org', 'contact' => 'Martha Williams', 'text' => 'If you have questions about employment opportunities at Faith Promise, please contact #email#'])

@endsection