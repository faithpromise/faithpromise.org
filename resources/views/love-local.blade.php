@extends('layouts.page', ['title' => 'Love Local'])

@section('page')

    @introsection(['title' => 'What\'s it About?'])
    <p>Faith Promise is engaging the world around us to share the hope of Christ in tangible ways.  Below you will find several opportunities to serve our community.</p>
    @endintrosection

    @bgsection(
        [
            'title' => 'Kids Hope USA',
            'class' => 'BackgroundSection--right',
            'image' => 'images/missions/kids-hope-wide.jpg',
            'buttons' => [
                [
                    'title' => 'Learn More',
                    'url' => $kids_hope->url
                ]
            ]
        ]
    )
    <p>Our partnership with Kids Hope USA is making a huge impact in the lives of kids (and their mentors) through one-on-one mentoring.</p>
    @endbgsection

    @textsection(['title' => 'Clothing Ministry', 'class' => '', 'image' => ''])
    <p>Help provide clothes to people in Knoxville who are in need.  Our year-round donation container is located in the gravel area in the back parking lot of the Faith Promise Pellissippi Campus.  It is directly to the left of the main trailer door.  Clothing is collected every weekend, sorted and then distributed to a mixture of FP members and local ministries.  In-season clothes are most helpful - especially jeans,  tennis shoes, coats, socks, and underwear.  If you would like to donate or help serve in this ministry, please email <a href="mailto:fpclothes@gmail.com">fpclothes@gmail.com</a>.</p>
    @endtextsection

    @cardsection(['title' => 'Additional Opporutunities', 'cards' => $organizations, 'class' => 'Section--lightGrey', 'image' => ''])

    @endcardsection

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you have questions or need help getting started with Love Local, please contact #email#', 'class' => ''])

@endsection