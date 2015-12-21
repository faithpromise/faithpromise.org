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
            'cards' => [],
            'buttons' => [],
            'page' => null
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
    if (strlen(trim($args['content'])) OR count($args["buttons"])): ?>
        <div class="GridSection-text">
            <?= $args['content'] ?>
            <?php if (count($args["buttons"])): ?>
                <p class="GridSection-buttons">
                    <?php foreach ($args["buttons"] as $button): ?>
                        <a class="Button GridSection-button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>
    <?php
    endif;
    ?>
    <div class="GridSection-cardsWrap">
        <?= view('partials.cards', ['cards' => $args['cards'], 'page' => $args['page']])->render(); ?>
    </div>
    </div><!-- // END .GridSection-container -->
    </div><!-- // END .GridSection -->
<?php endif; ?>