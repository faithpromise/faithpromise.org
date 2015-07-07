<?php
    $title = 'Meet Our Staff';
    $hero_image = '/build/images/temp/hero-placeholder.png';
    $staff_gallery_class = 'StaffSection--square Section--lightGrey';
    $grey_bg = 0;
?>

@extends('layouts.page')

@section('page')

<div class="Container Container--wide">

    <div class="PageFilters">
        <span class="PageFilters-label">Sort by:</span>
        <span class="PageFilters-option" ng-class="{ 'is-active': !staff_sort_method }" ng-click="staff_sort_method = null">Ministry Area</span>
        <span class="PageFilters-option" ng-class="{ 'is-active': staff_sort_method === 'campus' }" ng-click="staff_sort_method = 'campus'">Campus</span>
        <span class="PageFilters-option" ng-class="{ 'is-active': staff_sort_method === 'name' }" ng-click="staff_sort_method = 'name'">Name</span>
    </div>

</div>

<div ng-show="!staff_sort_method">
    @foreach ($teams as $team)
        <?php $staff_gallery_class = (($grey_bg = 1-$grey_bg) === 0) ? 'StaffSection--square Section--lightGrey' : 'StaffSection--square'; ?>
        @include('partials.staff_gallery', ['staff' => $team['staff'], 'title' => $team['title'], 'class' => $staff_gallery_class])
    @endforeach
</div>
<div ng-show="staff_sort_method === 'campus'">
    <ng-include src="'/partials/staff-by-campus.html'"></ng-include>
</div>
<div ng-show="staff_sort_method === 'name'">
    <ng-include src="'/partials/staff-by-name.html'"></ng-include>
</div>

@endsection