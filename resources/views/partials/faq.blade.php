<?php

$css_class = trim('Faq ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : 'Common Questions';

?>

<div class="{{ $css_class }}">
    <div class="Faq-container">
        <h2 class="Faq-title">{{ $title }}</h2>
        <ul class="Faq-grid">
            @foreach ($faq as $f)
            <li class="Faq-item">
                <h3 class="Faq-question">{!! $f['q'] !!}</h3>

                <div class="Faq-answer">
                    {!! $f['a'] !!}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>