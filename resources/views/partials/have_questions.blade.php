<?php

$css_class = trim('TextSection TextSection--center ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : 'Have Questions?';
$contact = isset($contact) ? $contact : $email;
$email_link = '<a href="mailto:' . $email . '">' . $contact . '</a>';
$text = str_replace('#email#', $email_link, (isset($text) ? $text : 'If you still have questions, please contact #email#.'));
$email = isset($email) ? $email : config('site.email');

?>

<div class="{{ $css_class }}">
    <div class="TextSection-container">
        <h2 class="TextSection-title">{{ $title }}</h2>

        <div class="TextSection-text">
            <p>
                <?= $text ?>
            </p>
        </div>
    </div>
</div>