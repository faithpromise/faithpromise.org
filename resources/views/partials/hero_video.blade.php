@inlinecss
<style type="text/css">

    /* 569px */
    @media (max-width: 35.5625em) {
        .HeroVideo-thumb {
            background-image: url(<?= cdn_image('md', 'full', $video->image, 'tall') ?>);
        }
    }

    /* 570px */
    @media (min-width: 35.625em) {
        .HeroVideo-thumb {
            background-image: url(<?= cdn_image('lg', 'full', $video->image, 'wide') ?>);
        }
    }

    /* 768px */
    @media (min-width: 48em) {
        .HeroVideo-thumb {
            background-image: url(<?= cdn_image('xl', 'quarter', $video->image, 'square') ?>);
        }
    }

    /* 1024px */
    @media (min-width: 64em) {
        .HeroVideo-thumb {
            background-image: url(<?= cdn_image('xl', 'half', $video->image, 'tall') ?>);
        }
    }
</style>
@endinlinecss

<div class="HeroVideo">
    <div class="HeroVideo-container">
        <div class="HeroVideo-thumbWrap">
            <div class="HeroVideo-thumb"></div>
        </div>
        <div class="HeroVideo-infoWrap">
            <div class="HeroVideo-info">
                @if (! empty($heading))
                    <span class="HeroVideo-heading">{{ $heading }}</span>
                @endif
                <h1 class="HeroVideo-title">{{ $video->title }}</h1>

                <div class="HeroVideo-meta">
                    @if (strlen($video->speaker_display_name))
                        <span class="HeroVideo-speaker">{{ $video->speaker_display_name }}</span>
                        <span class="HeroVideo-metaSeparator">&middot;</span>
                    @endif
                    <span class="HeroVideo-date">{{ $video->video_date->format('M, j Y') }}</span>
                </div>

                <div class="HeroVideo-buttons">
                    @if ($video->vimeo_id)
                        <span class="HeroVideo-button" open-video="{{ $video->id }}"><i class="icon-play"></i></span>
                    @endif
                    @if ($video->audio_url)
                        <a class="HeroVideo-button" href="{{ $video->audio_url }}" target="_blank">
                            <i class="icon-headphones"></i>
                        </a>
                    @endif
                    <span class="Dropdown-wrapper" uib-dropdown>
                    <span class="HeroVideo-button" uib-dropdown-toggle>
                        <i class="icon-share"></i> Share
                    </span>
                    <div class="Dropdown Dropdown--light Dropdown--bottomLeft">
                        <ul class="Dropdown-menu">
                            <li class="Dropdown-item">
                                <a class="Dropdown-link" facebook-share="<?= $video->url ?>">
                                    <i class="icon-facebook"></i> Share on Facebook
                                </a>
                            </li>
                            <li class="Dropdown-item">
                                <a class="Dropdown-link" href="<?= $video->twitter_share_url; ?>">
                                    <i class="icon-twitter"></i> Share on Twitter
                                </a>
                            </li>
                        </ul>
                    </div>
                </span>
                </div>
            </div>
        </div>
    </div>
</div>