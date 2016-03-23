<?php
$social_links = [
        'facebook'  => 'facebook',
        'twitter'   => 'twitter',
        'instagram' => 'instagram',
        'youtube'   => 'youtube-play',
        'vimeo'     => 'vimeo',
];
?>

<ul class="SocialButtons">
    @foreach ($social_links as $key => $icon)
    @if (isset($$key))
    <li class="SocialButtons-item">
        <a class="SocialButtons-link SocialButtons-link--{{ $key }} icon-{{ $icon  }}" href="{{ $$key }}" target="_blank"></a>
    </li>
    @endif
    @endforeach
</ul>