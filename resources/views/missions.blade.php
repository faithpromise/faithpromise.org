@extends('layouts.page', ['title' => 'Missions'])

@section('page')

    @introsection(['title' => 'Faith Promise Missions', 'class' => '', 'image' => ''])
    <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
    <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
    @endintrosection

    @cardsection(['title' => 'Upcoming Trips', 'class' => 'Section--lightGrey', 'cards' => $locations, 'no_text' => true])
    @endcardsection

    @textsection(['title' => 'Get Updates', 'class' => 'TextSection--center TextSection--compact', 'image' => ''])
    <p>Sign up for email notifications and we'll let you know when new trips are planned.</p>
    <a class="Button" target="_blank" href="http://faithpromise.us9.list-manage.com/subscribe?u=a2d18e426cb386730bf3010ca&id=37b27d5bb3&group[17705][64]=1">Sign Up</a>
    @endtextsection

    @profilessection(['title' => 'Missionaries', 'class' => 'Section--lightGrey', 'profiles' => $missionaries])
    @endprofilessection

    @bgsection([
        'title' => 'Love Local',
        'class' => 'BackgroundSection--right',
        'image' => 'images/missions/love-local-wide.jpg',
        'buttons' => [
            [
                'title' => 'Find Opportunities',
                'url' => route('loveLocal')
            ]
        ]
    ])
    <p>Opportunities abound for us to lend a hand, say a prayer, give a hug, and to be the hands and feet of God's love in our community.</p>
    @endbgsection

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you still have questions about a trip or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection