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

    @cardsection(['title' => 'Additional Opportunities', 'cards' => $organizations, 'class' => 'Section--lightGrey', 'image' => ''])

    @endcardsection

    @include('partials.have_questions', ['email' => 'missions@faithpromise.org', 'text' => 'If you have questions or need help getting started with Love Local, please contact #email#', 'class' => ''])

@endsection