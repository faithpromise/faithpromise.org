<div class="Card" link-to="{{ isset($url) ? $url : '' }}">
    @if (isset($url))
        <a class="Card-image" href="{{ $url }}" style="background-image: url({{ $image }});"></a>
    @else
        <span class="Card-image" style="background-image: url({{ $image }});"></span>
    @endif

    <div class="Card-body">
        @if (isset($url))
            <h3 class="Card-title"><a href="{{ $url }}">{{ $title }}</a></h3>
        @else
            <h3 class="Card-title">{{ $title }}</h3>
        @endif
        <h4 class="Card-subtitle">{{ isset($subtitle) ? $subtitle : '' }}</h4>
        <p class="Card-text">{{ isset($text) ? $text : '' }}</p>
    </div>
    <div class="Card-footer">
        @if (isset($url))
            <a class="Card-link" href="{{ $url }}">{{ (isset($url_text) && strlen($url_text)) ? $url_text : 'More Details' }}
                <i class="icon-right-open-big"></i></a>
        @endif
    </div>
</div>
