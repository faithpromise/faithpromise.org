@extends('layouts.page', ['title' => 'Bible Reading Plan', 'hero_image' => 'images/pages/bible-plan-wide.jpg'])

@section('page')

    <div class="BiblePlan">
        <div class="BiblePlan-container">

            <div class="BiblePlan-info">

                <h2>{{ $selected_date->format('l, F j') }}</h2>

                @foreach($passages as $passage)

                    <div>{{ $passage->passage }}</div>

                @endforeach

                <p>Get ready to walk with God and thousands of your church family on a journey through the Bible over the course of a year.</p>
                <p>Download the <a href="http://blog.faithpromise.org/wp-content/uploads/2015/01/fasting-booklet-inside-2015.pdf" target="_blank">21 Day Devotional</a>.<br>Also, check out <a href="http://youversion.com" target="_blank">YouVersion</a>, a Bible app for your phone or tablet.</p>

            </div>

            <div class="BibleCalendar">
                <div class="BibleCalendar-months">
                    Months:
                    @foreach($calendar_data['months'] as $month)
                    <a class="BibleCalendar-month" href="{{ route('biblePlanDay', ['month' => strtolower($month->format('F')), 'day' => 1]) }}">{{ $month->format('M') }}</a>
                    @endforeach
                </div>

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

            <div class="BiblePassages">
                @foreach($passages as $passage)

                    <div>{{ $passage->passage }}</div>

                @endforeach
            </div>
        </div>
    </div>

@endsection