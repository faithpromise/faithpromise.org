<!--TODO: Fix container-->

<div class="TableSection">
    <div class="TableSection-container">
        <h2 class="TableSection-title">Staff Directory</h2>
        <table class="StaffList">
            <tbody>
                @foreach ($staff as $member)
                    <tr class="StaffList-row" onclick="window.document.location='/staff/{{ $member->ident }}';">
                        <td class="StaffList-column StaffList-column--photo">
                            <span class="StaffList-photo" style="background-image:url('{{ $member->thumbnail }}');"></span>
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