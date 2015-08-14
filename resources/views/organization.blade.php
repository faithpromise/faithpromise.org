@extends('layouts.page', ['title' => $organization->name, 'hero_image' => $organization->image])

@section('page')

    @introsection(['title' => $organization->name])
    {!! $organization->description !!}
    @endintrosection

    {{--
        ========================================
        Contact
        ========================================
    --}}

    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'title' => 'Need more info?', 'contact' => $organization->contact, 'email' => $organization->email, 'phone' => $organization->phone, 'website' => $organization->website, 'text' => $organization->more_info])

    @cardsection(['title' => 'Other Local Opportunities', 'cards' => $organizations, 'class' => '', 'image' => ''])
    @endcardsection

@endsection