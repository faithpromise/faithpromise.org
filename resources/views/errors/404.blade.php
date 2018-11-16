@extends('layouts.page', ['title' => 'Page Not Found', 'hero_image' => 'images/general/404-wide.jpg'])

@section('page')

    @introsection(['title' => 'Oh no!'])
        <p>The page you requested does not exist. Please try using the navigation above to find the information you need.</p>
    @endintrosection

    @include('partials.have_questions', ['text' => 'If you can\'t find what you need, please contact us at #email# so we can help out.', 'class' => 'Section--lightGrey'])

@endsection