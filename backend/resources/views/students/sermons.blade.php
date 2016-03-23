@extends('layouts.default', ['title' => 'Sermons'])

@section('content')

    @include('partials.hero_video', [
        'video' => $latest_sermon,
        'heading' => 'Latest Sermon:'
    ])

    <div class="Content">

        <div class="SeriesSection">
            <div class="SeriesSection-container">
                <h2 class="SeriesSection-title text-left">Past Sermon Series</h2>
                <div class="SeriesGallery">
                    <ul class="SeriesGallery-list">
                        <?php $next_series_starts = null; ?>
                        @foreach($series as $item)
                            <li class="SeriesGallery-item">
                                <a id="to_series_{{ $item->slug }}_from_sermons" class="SeriesGallery-link" href="{{ route('series', $item->slug) }}">
                                    <img
                                        class="SeriesGallery-thumb lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        data-srcset="
                                            <?= resized_image_url($item->image, 1280, 'square') ?> 1280w,
                                            <?= resized_image_url($item->image, 800, 'square') ?> 800w,
                                            <?= resized_image_url($item->image, 480, 'square') ?> 480w,
                                            <?= resized_image_url($item->image, 320, 'square') ?> 320w
                                        "
                                        sizes="
                                            (min-width: 1000px) 20vw,
                                            (min-width: 800px) 25vw,
                                            (min-width: 600px) 33.33333vw,
                                            20vw
                                        ">
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