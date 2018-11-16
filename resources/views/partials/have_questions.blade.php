<?php

$css_class = trim('TextSection TextSection--center ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : 'Have Questions?';

$phone = isset($phone) ? $phone : '';
$website = isset($website) ? $website : '';
$email = isset($email) ? $email : config('site.email');
$contact = !empty($contact) ? $contact : $email;

$contact_methods = [];

if (empty($text)) {
    if (empty($email) && empty($phone) && empty($website)) {
        return;
    }
    if (!empty($email)) {
        $contact_methods[] = 'email #email#';
    }
    if (!empty($phone)) {
        $contact_methods[] = 'call #phone#';
    }
    if (!empty($website)) {
        $contact_methods[] = 'visit #website#';
    }

    if (count($contact_methods) > 1) {
        $contact_methods[count($contact_methods)-1] = 'or ' . $contact_methods[count($contact_methods)-1];
    }

    $text = 'For more information, please ' . implode(', ', $contact_methods) . '.';
}

if (strlen($website)) {
    $website_text = preg_replace('/^http(s?):\/\//', '', $website);
    $website = '<a href="' . $website . '">' . $website_text . '</a>';
    $text = str_replace('#website#', $website, $text);
}
if (strlen($phone)) {
    $phone = '<a class="no-wrap" href="tel:' . $phone . '">' . $phone . '</a>';
    $text = str_replace('#phone#', $phone, $text);
}

if (strlen($email)) {
    $email = '<a class="no-wrap" href="mailto:' . $email . '">' . $contact . '</a>';
    $text = str_replace('#email#', $email, $text);
}

if (strlen($contact)) {
    $text = str_replace('#contact#', $contact, $text);
}
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