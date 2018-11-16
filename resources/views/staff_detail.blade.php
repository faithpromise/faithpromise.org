@extends('layouts.staffer')

@section('page')

    @profilessection(
        [
            'title' => 'My Teammates',
            'profiles' => $staff,
            'class' => 'Section--lightGrey',
            'footer_buttons' => [
                [
                    'title' => 'Meet the Full Staff',
                    'url' => route('staff')
                ]
            ]
        ]
    )
    @endprofilessection

@endsection