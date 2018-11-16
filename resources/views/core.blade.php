@extends('layouts.page', ['title' => 'The Core'])

@section('page')

    @introsection(['title' => 'The Core'])
    <p>In {!! bible_verses('Acts 2:41-47') !!} we see how the church banded together as a Christ-centered community from the very beginning.  They gathered regularly to serve and spread Jesus' message of hope as they grew in grace, maturity, and number. They were a Core community who were committed to Jesus and His mission.  It is our desire to be this kind of Core community at Faith Promise, and we would be thrilled for you to join us.</p>
    <p>Who are the Core?  The Core are committed believers at Faith Promise who: </p>
    <ul>
        <li>have attended <a id="to_nextSteps_from_core" href="{{ route('nextSteps') }}">Next Steps</a>.</li>
        <li>have accepted Christ as <a id="to_salvation_from_core" href="{{ route('salvation') }}">Lord and Savior</a> and have been biblically <a id="to_baptism_from_core" href="{{ route('baptism') }}">baptized</a> by immersion after salvation.</li>
        <li>are actively <a id="to_serve_from_core" href="{{ route('serve') }}">serving</a> in a Faith Promise ministry area.</li>
        <li>are currently attending a Faith Promise <a id="to_groups_from_core" href="{{ route('groups') }}">group</a>.</li>
        <li>are <a id="to_give_from_core" href="{{ route('give') }}">financially supporting</a> Faith Promise with their tithe (giving 10%).</li>
    </ul>
    <p>
        This describes me and I'm ready to <a href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=TKlb4GD/QNfzITxG5irjPg==&cCode=RtKBDolfiPuZJp8o1+0ARA==">make it official</a>.
    </p>
    @endintrosection

    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'contact' => 'Penny Spivey', 'email' => 'pennys@faithpromise.org', 'text' => 'If you have questions about The Core or taking the next step, please contact #email#'])

@endsection