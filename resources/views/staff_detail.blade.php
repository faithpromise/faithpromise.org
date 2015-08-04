@extends('layouts.default', ['title' => $member->display_name])

@section('content')

    <div class="StaffHeader">
        <div class="StaffHeader-container">
            <div class="StaffHeader-content">
                <img class="StaffHeader-profilePhoto" src="{{ cdn_image('xl', 'quarter', $member->image) }}">
                <div class="StaffHeader-titles">
                    <h1 class="StaffHeader-name">{{ $member->display_name }}</h1>
                    <span class="StaffHeader-title">{{ $member->title }}</span>
                </div>
            </div>
        </div>
    </div>

    @textsection(['title' => 'My Story', 'image' => ''])
    {!! $member->bio !!}
    @endtextsection

@endsection