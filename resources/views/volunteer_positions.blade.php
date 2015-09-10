@extends('layouts.page', ['title' => 'Serving', 'hero_image' => 'images/pages/opportunities-wide.jpg'])

@section('page')

    @introsection(['title' => 'Opportunities to Serve at Faith Promise'])
    <p>Ready to take the next step and begin serving at Faith Promise?  Contact us using the form below. Already know where you want to serve? <a href="#continue">Let us know</a>.</p>
    @endintrosection

    <volunteer-positions></volunteer-positions>

@endsection