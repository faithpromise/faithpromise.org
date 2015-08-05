<?php
    $staff_gallery_class = 'StaffSection--square Section--lightGrey';
    $grey_bg = 0;
?>

@extends('layouts.default', ['title' => 'Meet Our Staff'])

@section('content')

<div class="Staff8bit">
    @foreach($staff_8bit as $i)
        <a class="Staff8bit-item _8bit-{{ $i->ident }}" href="{{ $i->url }}">
            {{--<img class="Staff8bit-image" src="{{ cdn_image('sm', 'quarter', $i->{"8bitPath"}) }}">--}}
        </a>
    @endforeach
</div>

<div class="Container Container--wide">
    @include('partials.staff_nav', ['campuses' => $campuses, 'active' => 'ministry'])
</div>

@foreach ($teams as $team)
    <?php $staff_gallery_class = 'ProfilesSection--large ' . ((($grey_bg = 1-$grey_bg) === 0) ? 'Section--lightGrey' : ''); ?>
    @profilessection(['title' => $team->title, 'class' => $staff_gallery_class, 'profiles' => $team->Staff])
    @endprofilessection
@endforeach

@endsection