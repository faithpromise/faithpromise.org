<table width="100%" border="0" cellpadding="7" cellspacing="0">
    <tbody>
        <tr>
            <td width="70" bgcolor="#fff" style="border-bottom:1px solid #ccc;"><b>From</b></td>
            <td bgcolor="#fff" style="border-bottom:1px solid #ccc;">{{ $first_name }} {{ $last_name }}</td>
        </tr>
        <tr>
            <td width="70" bgcolor="#f0f8ff" style="border-bottom:1px solid #ccc;"><b>Email</b></td>
            <td bgcolor="#f0f8ff" style="border-bottom:1px solid #ccc;">{{ $email }}</td>
        </tr>
        <tr>
            <td width="70" bgcolor="#fff" style="border-bottom:1px solid #ccc;"><b>Phone</b></td>
            <td bgcolor="#fff" style="border-bottom:1px solid #ccc;">{{ $phone }}</td>
        </tr>
        <tr>
            <td width="70" bgcolor="#f0f8ff" style="border-bottom:1px solid #ccc;"><b>Campus</b></td>
            <td bgcolor="#f0f8ff" style="border-bottom:1px solid #ccc;">{{ $campus }}</td>
        </tr>
        <tr>
            <td width="70" bgcolor="#fff" style="border-bottom:1px solid #ccc;"><b>Sent On</b></td>
            <td bgcolor="#fff" style="border-bottom:1px solid #ccc;">{{ $sent_at }}</td>
        </tr>
    </tbody>
</table>

<p>{{ $message_body }}</p>

