@extends('layouts.staffer')

@section('page')

    @profilessection(
        [
            'title' => 'Meet the Other Staff',
            'profiles' => $staff,
            'class' => 'Section--lightGrey'
        ]
    )
    @endprofilessection

@endsection