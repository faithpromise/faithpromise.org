<style type="text/css" scoped>
    @media (max-width: 499px) {
        .HeroVideo-image {
            background-image: url({{ cdn_image('sm', 'full', $video->hero_image) }});
        }

        /* -square */
    }

    @media (min-width: 500px) {
        .HeroVideo-image {
            background-image: url({{ cdn_image('md', 'full', $video->hero_image, 'square') }});
        }

        /* -tall */
    }

    @media (min-width: 1300px) {
        .HeroVideo-image {
            background-image: url({{ cdn_image('xl', 'half', $video->hero_image, 'tall') }});
        }
    }
</style>

<div class="HeroVideo">

    <div class="HeroVideo-container">

        <div class="HeroVideo-grid">

            <div class="HeroVideo-column HeroVideo-column--info">

                <div class="HeroVideo-info">

                    @if (! empty($heading))
                        <h2 class="HeroVideo-heading">{{ $heading }}</h2>
                    @endif
                    <h3 class="HeroVideo-title">{{ $video->title }}</h3>

                    <div class="HeroVideo-meta">
                        <div class="HeroVideo-metaText">
                            @if (strlen($video->speaker_name))
                                <span class="HeroVideo-speaker">{{ $video->speaker_name }}</span>
                                <span class="HeroVideo-metaSeparator">&middot;</span>
                            @endif
                            <span class="HeroVideo-date">{{ $video->publish_at->format('F d Y') }}</span>
                            <!--<span class="HeroVideo-series">&quot;{{ $video->Series->title }}&quot; series</span>-->
                        </div>
                    </div>

                    <div class="HeroVideo-buttons">
                        @if ($video->vimeo_id)
                            <span class="HeroVideo-button" ng-click="openVideo({{ $video->vimeo_id }})"><i class="icon-play"></i> Watch</span>
                        @endif
                        @if ($video->audio_file)
                            <a class="HeroVideo-button" href="{{ $site['audio_url'] }}{{ $video->audio_file }}" target="_blank">
                                <i class="icon-headphones"></i>
                            </a>
                        @endif
                            <a class="HeroVideo-button" href="https://www.facebook.com/dialog/share?app_id={{ $site['facebook_app_id'] }}&display=popup&href={{ $video->url }}&redirect_uri={{ $video->url }}">
                                <i class="icon-facebook"></i>
                            </a>
                            {{--<a class="HeroVideo-button" href="https://twitter.com/intent/tweet?text=Check+it+out&url={{ $video->url }}">--}}
                                {{--<i class="icon-twitter"></i>--}}
                            {{--</a>--}}
                    </div>

                </div>

            </div>

            <div class="HeroVideo-column HeroVideo-column--image">

                <div class="HeroVideo-imageWrap">
                    <div class="HeroVideo-image"></div>
                </div>

            </div>

        </div>

    </div>
</div>

{{--<div class="HeroVideo-column HeroVideo-column--actions">--}}

    {{--<div class="HeroVideo-actions">--}}
        {{--<a class="HeroVideo-actionsItem" href="https://www.facebook.com/dialog/share?app_id={{ $site['facebook_app_id'] }}&display=popup&href={{ $video->url }}&redirect_uri={{ $video->url }}">--}}
            {{--<svg class="HeroVideo-action" role="img" title="Share on Facebook">--}}
                {{--<use xlink:href="/build/svg/video.svg#facebook"></use>--}}
            {{--</svg>--}}
            {{--<span class="HeroVideo-actionText">share</span>--}}
        {{--</a>--}}
        {{--<!-- https://dev.twitter.com/web/intents -->--}}
        {{--<!-- We are using the "Limited Dependencies" code -->--}}
        {{--<a href="https://twitter.com/intent/tweet?text=Check+it+out&url={{ $video->url }}" class="HeroVideo-actionsItem">--}}
            {{--<svg class="HeroVideo-action" role="img" title="Tweet it">--}}
                {{--<use xlink:href="/build/svg/video.svg#twitter"></use>--}}
            {{--</svg>--}}
            {{--<span class="HeroVideo-actionText">tweet</span>--}}
        {{--</a>--}}

    {{--</div>--}}

{{--</div>--}}