@extends('layouts.default', ['title' => 'Staff Directory'])

@section('content')

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
                            <img
                                class="StaffList-photo lazyload"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-srcset="
                                    <?= resized_image_url($member->image, 1280, 'square') ?> 1280w,
                                    <?= resized_image_url($member->image, 800, 'square') ?> 800w,
                                    <?= resized_image_url($member->image, 480, 'square') ?> 480w,
                                    <?= resized_image_url($member->image, 320, 'square') ?> 320w
                                "
                                sizes="25vw">
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