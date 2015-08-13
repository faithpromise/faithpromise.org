@extends('layouts.page', ['title' => 'Sermons'])

@section('content')

    @include('partials.hero_video', [
        'video' => $latest_sermon,
        'heading' => 'Latest Sermon:'
    ])

    <div class="Content">

        <!-- TODO: Style this heading -->

        <div class="SeriesSection">
            <div class="SeriesSection-container">
                <h2 class="SeriesSection-title text-left">Past Sermon Series</h2>
                <div class="SeriesGallery">
                    <ul class="SeriesGallery-list">
                        <?php $next_series_starts = null; ?>
                        @foreach($series as $item)
                            <li class="SeriesGallery-item">
                                <a class="SeriesGallery-link" href="{{ route('seriesVideo', $item->slug) }}/">
                                    <img
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="SeriesGallery-thumb b-lazy"
                                            data-src-sm="{{ cdn_image('sm', 'quarter', $item->image, 'square') }}"
                                            data-src-md="{{ cdn_image('md', 'quarter', $item->image, 'square') }}"
                                            data-src-lg="{{ cdn_image('lg', 'quarter', $item->image, 'square') }}"
                                            data-src="{{ cdn_image('xl', 'quarter', $item->image, 'square') }}">

                                    <div class="SeriesGallery-titles">
                                        <h3 class="SeriesGallery-title">{{ $item->title }}</h3>
                                        <h4 class="SeriesGallery-subtitle">
                                            @if ($item->starts_at->isFuture() OR $latest_sermon->Series->slug === $item->slug)
                                                {{ $item->getDate($next_series_starts) }}
                                            @else
                                                {{ $item->when }}
                                            @endif
                                        </h4>
                                    </div>
                                </a>
                            </li>
                            <?php $next_series_starts = $item->starts_at; ?>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>

    </div>

@endsection