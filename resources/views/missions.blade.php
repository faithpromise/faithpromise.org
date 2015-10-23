@extends('layouts.page', ['title' => 'Missions'])

@section('page')

    @introsection([
        'title' => 'Faith Promise Missions'
        ,'buttons' => [
            [
                'title' => 'Missions Trip Application',
                'url' => 'http://form.jotform.us/form/50203894266153'
            ]
        ]
    ])
    <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
    <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
    @endintrosection

    @bgsection([
        'title' => 'Love Starts Here',
        'class' => 'BackgroundSection--right',
        'image' => 'images/missions/love-starts-here-offset-wide.jpg'
    ])
    <p>Good things happen when groups make serving together a priority. Leaders, download the <a class="no-wrap" href="{{ doc_url('Love-Starts-Here-Toolkit.pdf') }}">Leader Toolkit</a> and check out these <a href="http://vols.pt/4MgN88">pre-planned opportunities</a>. Then, please take a moment and <a class="no-wrap" href="http://faithpromiseweb.com/forms/view.php?id=5666">let us know</a> how you're serving.</p>
    @endbgsection

    @cardsection(['title' => 'Upcoming Trips', 'class' => 'Section--lightGrey', 'cards' => $locations, 'no_text' => true])
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

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you have questions about a trip or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection