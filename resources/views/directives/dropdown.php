<?php

/* @var $dropdown_directive array */

$dropdown_args = array_merge(
    [
        'text'  => '',
        'links' => []
    ], $dropdown_directive["args"]
);
$dropdown_args['class'] = trim('Dropdown ' . (isset($dropdown_args['class']) ? $dropdown_args['class'] : ''));

?>
<span class="Dropdown-wrapper" uib-dropdown><span class="<?= $dropdown_args['class'] ?>">
    <span class="Dropdown-menu">
        <?php foreach ($dropdown_args['links'] as $link): ?>
            <span class="Dropdown-item">
                <a class="Dropdown-link" href="<?= $link['url']; ?>" target="_blank"><?= $link['title']; ?></a>
            </span>
        <?php endforeach; ?>
    </span>
</span><a href="#" uib-dropdown-toggle><?= $dropdown_args['text']; ?></a></span>