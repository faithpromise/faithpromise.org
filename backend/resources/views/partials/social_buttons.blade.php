<?php
    $social_links = ['facebook', 'twitter', 'instagram', 'youtube'];
?>

<ul class="SocialButtons">
    @foreach ($social_links as $service)
    @if (isset($$service))
    <li class="SocialButtons-item">
        <a class="SocialButtons-link SocialButtons-link--{{ $service  }}" href="{{ $$service }}" target="_blank"></a>
    </li>
    @endif
    @endforeach
</ul>