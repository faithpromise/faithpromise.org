@extends('layouts.page', ['title' => 'Page Not Found', 'hero_image' => 'images/general/404-wide.jpg'])

@section('page')

    @introsection(['title' => 'Oh no!'])
        <p>We couldn't find the page you requested. It could have been moved or deleted. Please try using the navigation above to find the information you need.</p>
    @endintrosection

    @include('partials.have_questions', ['text' => 'If you can\'t find what you need, please contact us at #email# so we can help out.', 'class' => 'Section--lightGrey'])

@endsection