<?php
    $staff_gallery_class = 'StaffSection--square Section--lightGrey';
    $grey_bg = 0;
?>

@extends('layouts.default', ['title' => 'Meet Our Staff'])

@section('content')

<div class="Staff8bit">
    @foreach($staff_8bit as $i)
        <a id="to_staff_{{ $i->slug }}_from_8bit" class="Staff8bit-item Staff8bit-{{ $i->slug }}" href="{{ $i->url }}"></a>
    @endforeach
</div>

@include('partials.staff_nav', ['campuses' => $campuses, 'active' => 'ministry'])

@foreach ($teams as $team)
    <?php $staff_gallery_class = 'ProfilesSection--large ' . ((($grey_bg = 1-$grey_bg) === 0) ? 'Section--lightGrey' : ''); ?>
    @profilessection(['title' => $team->title, 'class' => $staff_gallery_class, 'profiles' => $team->Staff])
    @endprofilessection
@endforeach

@endsection
