@extends('layouts.page', ['title' => 'New Short Term Groups'])

@section('page')

    @cardsection(['title' => 'New Short Term Groups', 'cards' => $studies])
    <p class="text-center">Check out the new opportunities to plug into a small group this fall!</p>
    @endcardsection

    @include('partials.have_questions', ['email' => 'jenniferp@faithpromise.org', 'text' => 'If you have questions about a group or ways to get involved, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection