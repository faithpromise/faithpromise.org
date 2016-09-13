@extends('layouts.page', ['title' => 'fp Celebrate'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}
    @introsection(['title' => 'fpCelebrate'])
    <p>fpCelebrate provides Christ-centered support for addiction, hurts, habits & hang-ups. Together we fellowship, grow, and celebrate God's healing power in our lives. We provide a safe environment to share honestly with others walking a similar journey.</p>
    <p>You can always expect a challenging message from a variety of engaging speakers. Following our corporate time together, we provide a time for you to take your journey and recovery to the next level in small groups.</p>
    <p>Groups include Chemical Dependency; 12 Step Recovery; Co-Dependency; Anger Management; Men's Integrity; Family Recovery Support, Veterans Support & a variety of Growth Groups.</p>
    <p>Join us Mondays at the Pellissippi Campus - Dinner at 6pm, Worship & Message at 7pm and Groups at 8pm.</p>
    <p>Visit the <a href="http://blog.faithpromise.org/category/groups-ministry/fp-celebrate/">fpCelebrate blog</a> for additional information.</p>
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
                <td>Worship &amp; Message - a time of praise to God for what He is doing in our lives followed by a challenging and uplifting message from our fpCelebrate pastor, Kerri Karel, or other guest speakers.</td>
            </tr>
            <tr class="Calendar-row">
                <td class="Calendar-timeColumn">8:00 pm</td>
                <td>Small Group Time - a time to gather with others that are seeking growth and healing in a number of specific areas.</td>
            </tr>
        </tbody>
    </table>
    @endtextsection

    @include('partials.have_questions', [
        'email' => 'celebrate@faithpromise.org',
        'text' => 'Call 865-251-2590 ext. 3003 or email us at #email#'
    ])

@endsection