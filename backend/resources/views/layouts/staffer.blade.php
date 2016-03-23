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
                <div class="StaffContact-info">
                    @if ($member->has_social_links)
                        <div class="StaffContact-social">
                            @if (!empty($member->facebook))
                                <a class="StaffContact-socialIcon icon-facebook-circled" href="{{ $member->facebook_url }}"></a>
                            @endif
                            @if (!empty($member->twitter))
                                <a class="StaffContact-socialIcon icon-twitter-circled" href="{{ $member->twitter_url }}"></a>
                            @endif
                            @if (!empty($member->instagram))
                                <a class="StaffContact-socialIcon icon-instagram" href="{{ $member->instagram_url }}"></a>
                            @endif
                        </div>
                    @endif
                    @if (!empty($member->email))
                        <a class="StaffContact-email" href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                    @endif
                    @if (!empty($member->phone_ext))
                        <a class="StaffContact-phone" href="tel:{{ $site['phone'] }}{{ $member->phone_ext }}">{{ $site['phone'] }} x {{ $member->phone_ext }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (!empty($member->bio))
        @textsection(['title' => 'My Story', 'image' => ''])
        {!! $member->bio !!}
        @endtextsection
    @endif

    @yield('page')

@endsection