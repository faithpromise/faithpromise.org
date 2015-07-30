@extends('layouts.page', ['title' => 'fp Celebrate'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}
    @introsection(['title' => 'fpCelebrate'])
    <p>Celebrate Recovery takes place each week on our Pellissippi Campus and fp Celebrate exists to create a culture where you can connect, heal, and grow at Faith Promise Church.  Celebrate meets on Mondays at the FPC Pellissippi Campus. You can always expect a challenging message from a variety of engaging speakers, such as our very own Chad Funk, the leader of our fp Celebrate Ministry. Following our corporate time together, we provide a time for you to take  your journey and recovery to the next level in round table break out or small groups.  </p>
    <p>Bring a friend, family member, neighbor, or co-worker. We can't wait to see you there!</p>
    <p>Celebrate is a vital part of the Groups Ministry here at Faith Promise Church. As with all of our groups, we focus on creating environments where people encounter God, embrace others, and engage the world around us.</p>
    <p class="text-center">
        <a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7084&weekday=&start_time=" target="_blank">Find a Group</a>
        <a class="Button" href="http://blog.faithpromise.org/category/groups-ministry/fp-celebrate/" target="_blank">News &amp; Events</a>
    </p>
    @endintrosection

    @textsection(['title' => 'Monday Schedule', 'class' => 'TextSection--lightGrey TextSection--center'])
    <p>We meet on Monday nights in Satellite-1. Childcare is provided.</p>
    <table class="Calendar">
        <tbody>
            <tr class="Calendar-row">
                <td class="Calendar-timeColumn">6:00 pm</td>
                <td>Dinner &amp; Fellowship - a great time to decompress from your day and catch up with friends</td>
            </tr>
            <tr class="Calendar-row">
                <td class="Calendar-timeColumn">7:00 pm</td>
                <td>Worship - a multi-media experience of praise to God for what He is doing in our lives</td>
            </tr>
            <tr class="Calendar-row">
                <td class="Calendar-timeColumn">7:30 pm</td>
                <td>Message - a challenging and uplifting message from our Celebrate pastor or other guest speaker</td>
            </tr>
            <tr class="Calendar-row">
                <td class="Calendar-timeColumn">8:00 pm</td>
                <td>Small Group Time - a time to gather with others that are seeking growth and healing in a number of specific areas. It's very likely we have a group that will meet your specific need.</td>
            </tr>
        </tbody>
    </table>
    @endtextsection

    @include('partials.have_questions', [
        'email' => 'celebrate@faithpromise.org',
        'text' => 'Call 865-251-2590 ext. 3003 or email us at #email#'
    ])

@endsection