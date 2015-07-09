<?php

if ($events->isEmpty()) {
    return;
}

$css_class = trim('GridSection ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : 'Upcoming Events';

?>

<div class="{{ $css_class }}">
    <div class="GridSection-container">
        <h2 class="GridSection-title">{{ $title }}</h2>
        <div class="GridSection-text">{{ isset($text) ? $text : '' }}</div>
        <ul class="Card-grid" card-grid>
            @foreach($events as $event)
                <li class="Card-item">
                    @include('partials.card', ['title' => $event->title, 'subtitle' => '', 'image' => $event->getThumbnail(), 'text' => $event->excerpt, 'url' => '', 'url_text' => ''])
                </li>
            @endforeach
        </ul>
    </div>
</div>