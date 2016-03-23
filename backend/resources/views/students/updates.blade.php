@extends('layouts.page', ['title' => 'fpStudents Updates'])

@section('page')

    @cardsection([
        'title' => 'Here\'s What\'s Happening at fpStudents',
        'class' => 'Section--lightGrey GridSection--center',
        'cards' => $posts
    ])
    @include('students/_event_notice')
    @endcardsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['title' => 'Need More Info?', 'email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions about an event, we\'d love to help. Drop us a line at #email#.'])

@endsection