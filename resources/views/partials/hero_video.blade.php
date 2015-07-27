<style type="text/css" scoped>
    @media (max-width: 499px) {
        .HeroVideo-imageWrap {
            background-image: url({{ $hero_images['sm'] }});
        }

        /* -square */
    }

    @media (min-width: 500px) {
        .HeroVideo-imageWrap {
            background-image: url({{ $hero_images['md'] }});
        }

        /* -tall */
    }

    @media (min-width: 900px) {
        .HeroVideo-imageWrap {
            background-image: url({{ $hero_images['xl'] }});
        }

        /* -fade-out */
    }
</style>

<div class="HeroVideo" hero-video>
    <div class="HeroVideo-container">


        <div class="HeroVideo-imageWrap"></div>

        <div class="HeroVideo-info">

            @if (strlen($heading))
                <h2 class="HeroVideo-heading">{{ $heading }}</h2>
            @endif
            <h3 class="HeroVideo-title">{{ $video->title }}</h3>

            <div class="HeroVideo-meta">
                <div class="HeroVideo-metaText">
                    @if (strlen($video->speaker_name))
                        <span class="HeroVideo-speaker">{{ $video->speaker_name }}</span>
                        <span class="HeroVideo-metaSeparator">&middot;</span>
                    @endif
                    <span class="HeroVideo-date">{{ $video->publish_at->format('b d Y') }}</span>
                    <!--<span class="HeroVideo-series">&quot;{{ $series->title }}&quot; series</span>-->
                </div>
            </div>

            <div class="HeroVideo-buttons">
                @if ($video->vimeo_id)
                    <span class="HeroVideo-button" ng-click="openVideo({{ $video->vimeo_id }})"><i class="icon-play"></i> Watch</span>
                @endif
                @if ($video->audio_file)
                    <a class="HeroVideo-button" href="{{ $site['audio_url'] }}{{ $video->audio_file }}" target="_blank">
                        <i class="icon-headphones"></i> Listen
                    </a>
                @endif
            </div>

        </div>

        <div class="HeroVideo-actions">
            <a class="HeroVideo-actionsItem" href="https://www.facebook.com/dialog/share?app_id={{ $site['facebook_app_id'] }}&display=popup&href={{ $permalink }}&redirect_uri={{ $permalink }}">
                <svg class="HeroVideo-action" role="img" title="Share on Facebook">
                    <use xlink:href="/build/svg/video.svg#facebook"></use>
                </svg>
                <span class="HeroVideo-actionText">share</span>
            </a>
            <!-- https://dev.twitter.com/web/intents -->
            <!-- We are using the "Limited Dependencies" code -->
            <a href="https://twitter.com/intent/tweet?text=Check+it+out&url={{ $permalink }}" class="HeroVideo-actionsItem">
                <svg class="HeroVideo-action" role="img" title="Tweet it">
                    <use xlink:href="/build/svg/video.svg#twitter"></use>
                </svg>
                <span class="HeroVideo-actionText">tweet</span>
            </a>
      <span class="HeroVideo-actionsItem">
        <svg class="HeroVideo-action" role="img" title="Email a friend">
            <use xlink:href="/build/svg/video.svg#email"></use>
        </svg>
        <span class="HeroVideo-actionText">email</span>
      </span>
      <span class="HeroVideo-actionsItem">
        <svg class="HeroVideo-action" role="img" title="More">
            <use xlink:href="/build/svg/video.svg#more"></use>
        </svg>
        <span class="HeroVideo-actionText">more</span>
      </span>
        </div>
    </div>
</div>