@extends('layouts.default', ['title' => 'Sermons', 'nav_style' => 'solid'])

@section('content')

    @include('partials.hero_video', [
        'video' => $latest_sermon,
        'series' => $latest_sermon->Series,
        'hero_image' => $hero_image,
        'heading' => 'Latest Sermon:',
        'permalink' => $permalink
    ])

    <div class="Content">

        <div class="Container">

            {{--{% include sermons-filter.html active='series' %}--}}

            <h2 class="Section-title" ng-hide="false">Sermon Series</h2>

        </div>

        <div class="SeriesGallery">
            <ul class="SeriesGallery-list">
                <?php $next_series_starts = null; ?>
                @foreach($series as $item)
                    <li class="SeriesGallery-item">
                        <a class="SeriesGallery-link" href="{{ route('video', $item->ident) }}/">
                            <img class="SeriesGallery-thumb b-lazy" data-src="{{ $item->album_image }}">

                            <div class="SeriesGallery-titles">
                                <h3 class="SeriesGallery-title">{{ $item->title }}</h3>
                                <h4 class="SeriesGallery-subtitle">
                                    {{ $item->when }}
                                </h4>
                            </div>
                        </a>
                    </li>
                    <?php $next_series_starts = $item->starts_at; ?>
                @endforeach
            </ul>

        </div>

    </div>

@endsection