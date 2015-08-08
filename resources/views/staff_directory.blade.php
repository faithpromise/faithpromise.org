@extends('layouts.page', ['title' => 'Staff Directory', 'hero_image' => 'images/pages/staff-wide.jpg'])

@section('page')

<div class="Container Container--wide">
    @include('partials.staff_nav', ['campuses' => $campuses, 'active' => 'directory'])
</div>

<div class="TableSection">
    <div class="TableSection-container Container--wide">
        <h2 class="TableSection-title">Staff Directory</h2>
        <table class="StaffList">
            <tbody>
                @foreach ($staff as $member)
                    <tr class="StaffList-row" onclick="window.document.location='/staff/{{ $member->slug }}';">
                        <td class="StaffList-column StaffList-column--photo">
                            <span class="StaffList-photo b-lazy"
                                    data-src-sm="{{ cdn_image('sm', 'quarter', $member->image, 'square') }}"
                                    data-src-md="{{ cdn_image('md', 'quarter', $member->image, 'square') }}"
                                    data-src-lg="{{ cdn_image('lg', 'quarter', $member->image, 'square') }}"
                                    data-src="{{ cdn_image('xl', 'quarter', $member->image, 'square') }}"></span>
                        </td>
                        <td class="StaffList-column StaffList-column--name">
                            <span class="StaffList-name">{{ $member->display_name }}</span>
                            <span class="StaffList-title">{{ $member->title }}</span>
                        </td>
                        <td class="StaffList-column StaffList-column--phone">
                            @if (strlen($member->phone_ext))865-251-2590 x {{ $member->phone_ext }}@endif
                        </td>
                        <td class="StaffList-column StaffList-column--email">
                            @if (strlen($member->email))<a href="mailto://{{ $member->email }}">{{ $member->email }}</a>@endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection