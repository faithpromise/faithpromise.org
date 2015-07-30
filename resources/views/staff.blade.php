<?php
    $staff_gallery_class = 'StaffSection--square Section--lightGrey';
    $grey_bg = 0;
?>

@extends('layouts.page', ['title' => 'Meet Our Staff'])

@section('page')

<div class="Container Container--wide">
    @include('partials.staff_nav', ['campuses' => $campuses, 'active' => 'ministry'])
</div>

@foreach ($teams as $team)
    <?php $staff_gallery_class = 'ProfilesSection--large ' . ((($grey_bg = 1-$grey_bg) === 0) ? 'Section--lightGrey' : ''); ?>
    @profilessection(['title' => $team->title, 'class' => $staff_gallery_class, 'profiles' => $team->Staff])
    @endprofilessection
@endforeach

@endsection