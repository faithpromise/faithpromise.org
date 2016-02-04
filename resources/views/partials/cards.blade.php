<?php

$card_grid_class = trim('Card-grid ' . (isset($class) ? $class : ''));

?>

<ul class="<?= $card_grid_class ?>" card-grid>
    <?php
        foreach ($cards as $card):
        $card_tag = empty($card->card_url) ? 'div' : 'a';
    ?>
    <li class="Card-item">
        <{{ $card_tag }} id="{{ $card->card_link_id }}" class="Card" href="{{ $card->card_url }}">

            <!-- Remember to update Card.less if you change media queries here -->
            <img srcset="
                http:<?= resized_image_url($card->card_image, 800, 'tall') ?> 800w,
                http:<?= resized_image_url($card->card_image, 480, 'tall') ?> 480w
            " sizes="
                (min-width: 65em) 33.3vw,
                (min-width: 42em) 50vw,
                100vw
            ">

            <div class="Card-body">
                <h3 class="Card-title"><?= $card->card_title ?></h3>
                <?php if (!empty($card->card_subtitle)): ?>
                <h4 class="Card-subtitle"><?= $card->card_subtitle ?></h4>
                <?php endif; ?>
                <?php if (!empty($card->card_text)): ?>
                <p class="Card-text"><?= $card->card_text; ?></p>
                <?php endif; ?>
            </div>
            <div class="Card-footer">
                <?php if (!empty($card->card_url)): ?>
                <span class="Card-link"><?= (isset($card->card_url_text) && strlen($card->card_url_text)) ? $card->card_url_text : "More Details" ?>
                    <i class="icon-right-open-big"></i>
                </span>
                <?php else: ?>
                    <!-- LATER: Need a better solution for ensuring same height on cards. Handle this in card-grid directive. -->
                    <span class="Card-link">&nbsp;</span>
                <?php endif; ?>
            </div>
        </{{ $card_tag }}>
    </li>
    <?php endforeach; ?>
</ul>