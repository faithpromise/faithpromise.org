@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @introsection([
        'title' => $campus->name . ' Campus',
        'class' => 'IntroSection--center',
        'buttons' => [
            [
                'title' => 'Get Directions',
                'url' => $campus->directions_url,
                'target' => '_blank'
            ]
        ]
    ])
    <p>We'd love to see you this weekend at our {{ $campus->name }} Campus. You'll experience contemporary worship and an engaging message from our Senior Pastor Chris Stephens.</p>
    <p>Located at {{ $campus->address }}, {{ $campus->city }}, {{ $campus->state }} {{ $campus->zip }}</p>
    <p>Contact us: (865) 251-2590</p>
    <p><strong>Student services:</strong> {!! $campus->times !!}.</p>
    @endintrosection

    {{--TODO: Student pastor--}}

    {{--TODO: Contact us --}}

@endsection