@extends('layouts.page', ['title' => $kids_hope->name, 'hero_image' => 'images/pages/kids-hope-usa-wide.jpg'])

@section('page')

    @introsection(
        [
            'title' => $kids_hope->name,
            'buttons' => [
                [
                    'title' => 'Ministry Overview (pdf)',
                    'url' => doc_url('kids-hope-information.pdf')
                ]
            ]
        ]
    )
    {!! $kids_hope->description !!}
    @endintrosection

    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'title' => 'Need more info?', 'contact' => $kids_hope->contact, 'email' => $kids_hope->email, 'phone' => $kids_hope->phone, 'website' => $kids_hope->website, 'text' => $kids_hope->more_info])

@endsection