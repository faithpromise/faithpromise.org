<?php

$card_grid_class = trim('Card-grid ' . (isset($class) ? $class : ''));

?>

<ul class="<?= $card_grid_class ?>" card-grid>
    <?php foreach ($cards as $card): ?>
    <li class="Card-item">
        <div class="Card" link-to="<?= isset($card->card_url) ? $card->card_url : ""; ?>">
            <?php if (!empty($card->card_url)): ?>
            <a class="Card-image b-lazy"
                    href="<?= $card->card_url; ?>"
                    data-src-sm="<?= cdn_image('sm', 'full', $card->card_image) ?>"
                    data-src-md="<?= cdn_image('md', 'full', $card->card_image) ?>"
                    data-src-lg="<?= cdn_image('lg', 'full', $card->card_image) ?>"
                    data-src="<?= cdn_image('xl', 'half', $card->card_image) ?>"></a>
            <?php else: ?>
            <span class="Card-image b-lazy"
                    data-src-sm="<?= cdn_image('sm', 'full', $card->card_image) ?>"
                    data-src-md="<?= cdn_image('md', 'full', $card->card_image) ?>"
                    data-src-lg="<?= cdn_image('lg', 'full', $card->card_image) ?>"
                    data-src="<?= cdn_image('xl', 'half', $card->card_image) ?>"></span>
            <?php endif; ?>
            <div class="Card-body">
                <?php if (!empty($card->card_url)): ?>
                <h3 class="Card-title"><a href="<?= $card->card_url ?>"><?= $card->card_title ?></a></h3>
                <?php else: ?>
                <h3 class="Card-title"><?= $card->card_title ?></h3>
                <?php endif; ?>
                <?php if (!empty($card->card_subtitle)): ?>
                <h4 class="Card-subtitle"><?= $card->card_subtitle ?></h4>
                <?php endif; ?>
                <?php if (!empty($card->card_text)): ?>
                <p class="Card-text"><?= $card->card_text; ?></p>
                <?php endif; ?>
            </div>
            <div class="Card-footer">
                <?php if (!empty($card->card_url)): ?>
                <a class="Card-link" href="<?= $card->card_url; ?>"><?= (isset($card->card_url_text) && strlen($card->card_url_text)) ? $card->card_url_text : "More Details" ?>
                    <i class="icon-right-open-big"></i>
                </a>
                <?php else: ?>
                    <!-- LATER: Need a better solution for ensuring same height on cards. Handle this in card-grid directive. -->
                    <span class="Card-link">&nbsp;</span>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php endforeach; ?>
</ul>