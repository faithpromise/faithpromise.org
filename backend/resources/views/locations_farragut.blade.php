@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @videosection([
        'video' => '221007373',
        'title' => $campus->name . ' Campus',
        'class' => 'IntroSection--center',
    ])
    <p>We’re very excited about launching our new Farragut Campus. Our service times will be 10:00 &amp; 11:30 am starting with our first service on Sunday, August 13 in the Farragut High School auditorium. Students will meet on Wednesdays from 6:30-8:30 starting on August, 16. We'll see you there!</p>
    @endvideosection

    @if (isset($what_to_expect_cards))
        @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
        <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
        @endcardsection
    @endif

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->name . ' Campus Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection