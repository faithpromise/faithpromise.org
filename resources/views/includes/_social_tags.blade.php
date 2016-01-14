@if (array_key_exists('facebook_app_id', $site))
    <meta property="fb:app_id" content="{{ $site['facebook_app_id'] }}">
@endif
@if (isset($og_type))
    <meta property="og:type" content="{{ $og_type }}">
    @if ($og_type === 'article')
        @if (isset($article_author))
            <meta property="article:author" content="{{ $article_author }}">
        @elseif (array_key_exists('facebook', $site))
            <meta property="article:author" content="{{ facebook_url($site['facebook']) }}">
        @endif
    @endif
@endif
<meta property="og:description" content="{{ isset($facebook_description) ? $facebook_description : isset($title) ? $title : $site['title'] }}">
<meta property="og:locale" content="en_US">
<meta property="og:image" content="{!! open_graph_url_filter($og_image) !!}">
<meta property="og:image:width" content="{{ isset($og_image_width) ? $og_image_width : '1200' }}">
<meta property="og:image:height" content="{{ isset($og_image_height) ? $og_image_height : '675' }}">

<meta name="twitter:card" content="{{ isset($twitter_card) ? $twitter_card : 'summary' }}">
<meta name="twitter:site" content="{{ '@' . config('site.twitter') }}">