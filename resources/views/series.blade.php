@extends('layouts.page', ['title' => $series->title, 'hero_image' => $series->hero_image])

@section('page')

    <div class="TableSection">
        <div class="TableSection-container">
            <h1 class="TableSection-title">Messages</h1>
            <table class="Playlist">
        <thead>
            <tr>
                <th class="Playlist-title">Title</th>
                <th class="Playlist-speaker">Speaker</th>
                <th class="Playlist-date">Date</th>
                <th></th>
            </tr>
        </thead>
        <!-- TODO: Highlight currently selected video -->
        <tbody>
            @foreach ($series->Videos as $v)
                <tr class="{% if v.ident == include.selected %}Playlist-selected{% endif %}">
                    <td><a href="{{ route('seriesVideo', ['series' => $series->ident, 'video' => $v->ident]) }}" title="Learn more">{{ $v->title }}</a></td>
                    <td>{{ $v->speaker_name }}</td>
                    <td>{{ $v->sermon_date->format('M d, Y') }}</td>
                    <td class="Playlist-iconColumn">
                        <div class="Dropdown-wrapper" dropdown>
                            <span class="PlayList-iconLink" title="More options" dropdown-toggle>
                                <i class="MoreIcon"></i>
                            </span>

                            <div class="Dropdown Dropdown--topLeft">
                                <h3 class="Dropdown-title">{{ $v->title }}</h3>
                                <ul class="Dropdown-menu">
                                    <li class="Dropdown-item">
                                        <span class="Dropdown-link" facebook-share="{{ $v->url }}"><i class="icon icon-facebook"></i> Share on Facebook</span>
                                    </li>
                                    <li class="Dropdown-item">
                                        <span class="Dropdown-link"><i class="icon icon-twitter"></i> Tweet</span>
                                    </li>
                                    <li class="Dropdown-item">
                                        <span class="Dropdown-link"><i class="icon icon-mail"></i> Share by email</span>
                                    </li>
                                    <li class="Dropdown-item">
                                        <span class="Dropdown-link"><i class="icon icon-download"></i> Download audio</span>
                                    </li>
                                    <li class="Dropdown-item">
                                        <span class="Dropdown-link"><i class="icon icon-link"></i> Copy link</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>

@endsection