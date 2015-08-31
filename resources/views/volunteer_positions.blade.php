@extends('layouts.page', ['title' => 'Serving'])

@section('page')

    @introsection(['title' => 'Opportunities to Serve at Faith Promise'])
    <p>Ready to take the next step and begin serving at Faith Promise?  Contact us using the form below.</p>
    @endintrosection

    <volunteer-positions></volunteer-positions>

@endsection