<table class="Playlist">
    <thead>
        <tr>
            <th class="Playlist-titleHeader">Title</th>
            <th class="Playlist-speakerHeader">Speaker</th>
            <th class="Playlist-dateHeader">Date</th>
            {{--<th></th>--}}
        </tr>
    </thead>
    <tbody>
        @foreach ($videos as $v)
            <tr class="{% if v.slug == include.selected %}Playlist-selected{% endif %}">
                <td class="Playlist-titleColumn"><a id="to_video_{{ $v->slug }}" href="{{ $v->url }}" title="Learn more">{{ $v->title }}</a></td>
                <td class="Playlist-speakerColumn">{{ $v->speaker_display_name }}</td>
                <td class="Playlist-dateColumn">{{ $v->sermon_date_formatted }}</td>
            </tr>
        @endforeach
    </tbody>
</table>