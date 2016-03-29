<?php

function formatted_service_times($times) {
    return '<span class="no-wrap">' . implode('</span>, <span class="no-wrap">', $times) . '</span>';
}

$og_image = url('images/series/after-the-fall-tall.jpg');

?>

@extends('layouts.default', ['title' => 'Easter', 'og_image' => $og_image])

@section('content')

    <div class="AfterTheFall">
        <div class="AfterTheFall-content">
            <div class="AfterTheFall-videoContainer">
                <div class="VideoPlayer">
                    <iframe src="https://www.youtube.com/embed/cdgaTG_mYmY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="AfterTheFall-shareContainer">
                <div class="AfterTheFall-shareLinks">
                    <span class="AfterTheFall-shareLink" facebook-share>
                      <i class="AfterTheFall-shareIcon icon-facebook"></i> Share on Facebook
                    </span>
                    <a class="AfterTheFall-shareLink" href="https://twitter.com/intent/tweet?text=Sneak%20peak%20of%20%40faithpromise%20original%20movie%2C%20%22After%20the%20Fall.%22%20%23fpeaster&url=http://faithpromise.org/easter">
                        <i class="AfterTheFall-shareIcon icon-twitter"></i> Share on Twitter
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section--lightGrey">
        <div class="Section-container">
            <h2 class="Section-title text-center">Find a Location</h2>
            <p class="text-constrain">Our Faith Promise original film, &quot;After the Fall&quot; will be shown at all of our locations during the week leading up to Easter, and Easter weekend.</p>
            <p class="text-constrain"><i class="icon-asl"></i> Sign language available at our Pellissippi Campus on March 26 at 5:00 PM.</p>

            <div class="Times">
                <div class="Times-column">
                    <?php $counter = 0; $break_at = intval(round($service_days->count() / 2)) + 1; ?>
                    @foreach($service_days as $key => $day)
                        @if (++$counter === $break_at)
                </div>
                <div class="Times-column">
                    @endif
                    <div class="Times-day">
                        <h3 class="Times-heading">{{ \Carbon\Carbon::parse($key)->format('l, M j') }}</h3>
                        <table class="Times-list">
                            <tbody>
                                @foreach($day as $d)
                                    <tr>
                                        <td class="Times-campus"><a href="{{ $d->campus->url }}">{{ $d->campus->name }}</a></td>
                                        <td class="Times-times">{!! formatted_service_times($d->service_times) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    <div class="Times-day">
                        <h3 class="Times-heading">Theater Showings</h3>
                        <p>Seating is limited. First come, first served. Free admission. Doors open 15 minutes before showtime.</p>
                        <table class="Times-list">
                            <tbody>
                                <tr>
                                    <td class="Times-campus Times-campus--theater"><a href="https://goo.gl/maps/D3aMJ6WA5iz">Regal Pinnacle at Turkey Creek</a></td>
                                    <td class="Times-times Times-times--theater">Sunday, Mar 27 at <span class="no-wrap">5:30 PM, 7:00 PM, &amp; 8:15 PM</span></td>
                                </tr>
                                <tr>
                                    <td class="Times-campus Times-campus--theater"><a href="https://goo.gl/maps/Ra47qUNpnNJ2">Carmike Foothills 12 (Maryville)</a></td>
                                    <td class="Times-times Times-times--theater">Sunday, Mar 27 at <span class="no-wrap">5:30 PM &amp; 7:00 PM</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @bgsection([
        'title' => 'Easter Fun for the Kids',
        'class' => '',
        'image' => 'images/fpkids/rocket.jpg',
        'buttons' => [
                [
                    'title' => 'Learn More',
                    'url' => route('fpKids')
                ]
            ]
        ])
    <p>Exciting things are happening this Easter at fpKids! While you experience After the Fall, your kids (birth-5th grade) will enjoy age-appropriate stories & activities in fpKids.</p>
    @endbgsection

@endsection