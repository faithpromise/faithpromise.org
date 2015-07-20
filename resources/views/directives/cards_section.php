<?php

/* @var $directive array */

// Exit if no cards
if (!isset($directive["args"]['cards']) OR count($directive["args"]['cards']) === 0) {
    return;
}

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'cards' => []
        ], $directive["args"]
    );
    $args['class'] = trim('GridSection ' . (isset($args['class']) ? $args['class'] : ''));

    ?>

    <div class="<?= $args['class'] ?>">
    <div class="GridSection-container">
    <?php if (strlen($args['title'])): ?>
    <h2 class="GridSection-title"><?= $args['title'] ?></h2>
<?php endif;
    ob_start(); ?>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <?php $args['content'] = ob_get_clean();
    if (strlen(trim($args['content']))): ?>
        <div class="GridSection-text">
            <?= $args['content'] ?>
        </div>
    <?php
    endif;
    ?>
    <ul class="Card-grid" card-grid>
        <?php foreach ($args['cards'] as $card): ?>
            <li class="Card-item">
                <div class="Card" link-to="<?= isset($card->card_url) ? $card->card_url : ""; ?>">
                    <?php if (isset($card->card_url)): ?>
                        <a class="Card-image b-lazy" href="<?= $card->card_url; ?>" data-src="<?= $card->card_image ?>"></a>
                    <?php else: ?>
                        <span class="Card-image" style="background-image: url(<?= $card->card_image ?>);"></span>
                    <?php endif; ?>
                    <div class="Card-body">
                        <?php if (isset($card->card_url)): ?>
                            <h3 class="Card-title"><a href="<?= $card->card_url ?>"><?= $card->card_title ?></a></h3>
                        <?php else: ?>
                            <h3 class="Card-title"><?= $card->card_title ?></h3>
                        <?php endif; ?>
                        <h4 class="Card-subtitle"><?= isset($card->card_subtitle) ? $card->card_subtitle : ""; ?></h4>
                        <p class="Card-text"><?= isset($card->card_text) ? $card->card_text : ""; ?></p>
                    </div>
                    <div class="Card-footer">
                        <?php if (isset($card->card_url)): ?>
                            <a class="Card-link" href="<?= $card->card_url; ?>"><?= (isset($card->card_url_text) && strlen($card->card_url_text)) ? $card->card_url_text : "More Details" ?>
                                <i class="icon-right-open-big"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    </div><!-- // END .GridSection-container -->
    </div><!-- // END .GridSection -->
<?php endif; ?>