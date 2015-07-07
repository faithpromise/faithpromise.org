<?php

$css_class = trim('StaffSection ' . (isset($class) ? $class : ''));
$title = isset($title) ? $title : '';

?>

<div class="{{ $css_class }}">
    <div class="StaffSection-container">
        <h2 class="StaffSection-title">{{ $title }}</h2>
        <ul class="StaffSection-grid">
            @foreach ($staff as $member)

                <?php
                $staff_default_photo = 'https://placekitten.com/g/200/300';
                $staff_photo = $site['staff_images_root'] . '/' . $member['ident'] . '-1.jpg';
                $staff_photo_path = $site['staff_images_dir'] . '/' . $member['ident'] . '-1.jpg';
                $photo_url = file_exists($staff_photo_path) ? $staff_photo : $staff_default_photo;
                ?>

                <li class="StaffSection-item">
                    <a class="StaffSection-card" href="/staff/{{ $member['ident'] }}/">
                        <span class="StaffSection-photo" style="background-image:url('{{ $photo_url }}');"></span>
                        <span class="StaffSection-name">{{ $member['display_name'] }}</span>
                        <span class="StaffSection-staffTitle">{{ $member['title'] }}</span>
                    </a>
                </li>

            @endforeach
        </ul>
    </div>
</div>