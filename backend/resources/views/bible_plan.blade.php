@extends('layouts.page', ['title' => 'Bible Reading Plan', 'hero_image' => 'images/pages/bible-plan-wide.jpg'])

@section('page')

    <div class="BiblePlan">
        <div class="BiblePlan-container">

            <div class="BiblePlan-info">

                <div class="BiblePlan-today">
                    <h2 class="BiblePlan-infoHeading">{{ $selected_date->format('l, F j') }}</h2>
                    <ul class="BiblePlan-refsList">
                        @foreach($passages as $key => $passage)
                            <li class="BiblePlan-refsItem">
                                <a class="BiblePlan-refsLink" href="#passage-{{ $key+1 }}">{{ $passage->passage }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="BiblePlan-rule">
                    <p>Get ready to walk with God and thousands of your church family on a journey through the Bible over the course of a year.</p>
                    <a class="Button Button--light BiblePlan-readButton" href="#passage-1">Read Today's Verses</a>
                </div>

                <p class="BiblePlan-more">Download Pastor Chris' new book,
                    <a href="http://blog.faithpromise.org/wp-content/uploads/2016/12/Called-Out-Book-Full.pdf" target="_blank">&quot;Called Out&quot;</a> (PDF).<br>Also, check out
                    <a href="http://youversion.com" target="_blank">YouVersion</a>, a Bible app for your phone or tablet.
                </p>

            </div>

            <div class="BiblePlan-calendarWrap">
                <div class="BibleCalendar">
                    <div class="BibleCalendar-months">
                        @foreach($calendar_data['months'] as $month)
                            <a class="BibleCalendar-month{{ ($month->month == $selected_date->month) ? ' is-active' : '' }}" href="{{ route('biblePlanDay', ['month' => strtolower($month->format('F')), 'day' => 1]) }}"><span class="BibleCalendar-monthText">{{ $month->format('M') }}</span></a>
                        @endforeach
                    </div>

                    <ul class="BibleCalendar-mobileNav">
                        <li class="BibleCalendar-mobilePrev">
                            <a class="BibleCalendar-mobileMonth" href="{{ route('biblePlanDay', ['month' => strtolower($calendar_data['previous_month']->format('F')), 'day' => 1]) }}">&larr; {{ $calendar_data['previous_month']->format('M') }}</a>
                        </li>
                        <li class="BibleCalendar-mobileCurrent">
                            <span class="BibleCalendar-mobileMonth">{{ $selected_date->format('F') }}</span>
                        </li>
                        <li class="BibleCalendar-mobileNext">
                            <a class="BibleCalendar-mobileMonth" href="{{ route('biblePlanDay', ['month' => strtolower($calendar_data['next_month']->format('F')), 'day' => 1]) }}">{{ $calendar_data['next_month']->format('M') }} &rarr; </a>
                        </li>
                    </ul>

                    <table class="BibleCalendar-grid">
                        <thead>
                            <tr>
                                @foreach($calendar_data['days_of_week'] as $dow)
                                    <td class="BibleCalendar-dow">{{ $dow }}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calendar_data['weeks'] as $days)
                                <tr class="BibleCalendar-week">
                                    @foreach($days as $day)
                                        <td class="BibleCalendar-day {{ ($day->month <> $selected_date->month ? 'is-outside-month' : '') . ($day->isSameDay($selected_date) ? 'is-selected' : '') }}">
                                            <a href="{{ route('biblePlanDay', ['month' => strtolower($day->format('F')), 'day' => $day->format('j')]) }}" class="BibleCalendar-dayNumber">{{ $day->format('j') }}</a>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="BiblePassages">
        <div class="BiblePassages-container">
            @foreach($passages as $key => $passage)
                <div id="passage-{{ $key+1 }}">
                    <h2 class="BiblePassages-title">{{ $passage->passage }}</h2>
                    {!! $passage->passage_text !!}
                </div>
            @endforeach
        </div>
    </div>

@endsection