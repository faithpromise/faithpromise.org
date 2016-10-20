@extends('layouts.page', ['title' => 'Missions'])

@section('page')

    @videosection([
        'title' => 'Faith Promise Missions'
        ,'video' => '187719394'
        ,'buttons' => [
            [
                'title' => 'Missions Trip Application',
                'url' => 'http://form.jotform.us/form/50203894266153'
            ]
        ]
    ])
    <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
    <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
    @endvideosection

    @cardsection(['title' => 'Upcoming Trips', 'class' => 'Section--lightGrey', 'cards' => $locations, 'no_text' => true])
    @endcardsection

    {{--
    ================================================================================
        Events
    ================================================================================ --}}

    @cardsection(['title' => 'Upcoming Events', 'class' => '', 'cards' => $ministry->Events])
    @endcardsection

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

    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Meet the Missions Team Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you have questions about a trip or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection