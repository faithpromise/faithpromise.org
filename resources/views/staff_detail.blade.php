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
    <div class="StaffContact">
        <div class="StaffContact-container">
            <div class="StaffContact-content">
                <div class="StaffContact-social">
                    <a class="StaffContact-socialIcon icon-facebook-circled" href="{{ $member->facebook }}"></a>
                    <a class="StaffContact-socialIcon icon-twitter-circled" href="{{ $member->twitter }}"></a>
                    <a class="StaffContact-socialIcon icon-instagram" href="{{ $member->instagram }}"></a>
                </div>
                <a class="StaffContact-email" href="mailto::{{ $member->email }}">{{ $member->email }}</a>
                <a class="StaffContact-phone" href="tel:{{ $site['phone'] }}{{ $member->phone_ext }}">{{ $site['phone'] }} x {{ $member->phone_ext }}</a>
            </div>
        </div>
    </div>

    @textsection(['title' => 'My Story', 'image' => ''])
    {!! $member->bio !!}
    @endtextsection

@endsection