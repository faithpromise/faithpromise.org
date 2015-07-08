<?php

/* @var $site array */
/* @var $member object */

$css_class = trim('StaffSection ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : '';

?>

<div class="{{ $css_class }}">
    <div class="StaffSection-container">
        <h2 class="StaffSection-title">{{ $title }}</h2>
        <ul class="StaffSection-grid">
            @foreach ($staff as $member)

                <li class="StaffSection-item">
                    <a class="StaffSection-card" href="/staff/{{ $member->ident }}/">
                        <span class="StaffSection-photo" style="background-image:url('{{ $member->getThumbnail() }}');"></span>
                        <span class="StaffSection-name">{{ $member->display_name }}</span>
                        <span class="StaffSection-staffTitle">{{ $member->title }}</span>
                    </a>
                </li>

            @endforeach
        </ul>
    </div>
</div>