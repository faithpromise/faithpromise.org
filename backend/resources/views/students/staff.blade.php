@extends('layouts.page', ['title' => 'fpStudents Staff', 'hero_image' => 'images/general/default-wide.jpg'])

@section('page')

@profilessection(['title' => 'fpStudents Staff', 'profiles' => $staff])
@endprofilessection

@endsection
