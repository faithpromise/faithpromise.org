<?php

$css_class = trim('TextSection TextSection--center ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : 'Have Questions?';
$text = isset($text) ? $text : 'If you still have questions, please contact';
$email = isset($email) ? $email : config('site.email');
$contact = isset($contact) ? $contact : $email;

?>

<div class="{{ $css_class }}">
    <div class="TextSection-container">
        <h2 class="TextSection-title">{{ $title }}</h2>

        <div class="TextSection-text">
            <p>
                {{ $text }}
                <a href="mailto:{{ $email }}">{{ $email }}</a>.
            </p>
        </div>
    </div>
</div>