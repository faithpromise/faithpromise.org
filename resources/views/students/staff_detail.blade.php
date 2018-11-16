@extends('layouts.staffer')

@section('page')

    @profilessection(
        [
            'title' => 'Meet the Rest of the Team',
            'profiles' => $staff,
            'class' => 'Section--lightGrey'
        ]
    )
    @endprofilessection

@endsection