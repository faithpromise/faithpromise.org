@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @videosection([
        'video' => '145143741',
        'title' => $campus->name . ' Campus',
        'class' => 'IntroSection--center',
        'buttons' => [
            [
                'title' => 'Receive Updates',
                'url' => 'http://faithpromise.us9.list-manage.com/subscribe?u=a2d18e426cb386730bf3010ca&id=37b27d5bb3&group[17705][8388608]=1'
            ]
        ]
    ])
    <p>We’re very excited to see our Loudon Campus launch, and we're in the process of working out details for this location!</p>
    @endvideosection

    @cardsection(['title' => 'What to Expect', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    <p>When you come, the only thing we ask of you is simple... relax. You're with friends. Whether you've never been to church before or you're a seasoned church veteran, you can anticipate an encouraging and enlightening experience.</p>
    @endcardsection

    @profilessection(['id' => 'staff', 'title' => 'Meet the ' . $campus->name . ' Campus Team', 'profiles' => $campus->Staff])
    @endprofilessection

@endsection