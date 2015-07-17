<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = $directive['args'];
    $css_class = trim('GridSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $css_class ?>">
    <div class="GridSection-container">
    <h2 class="GridSection-title"><?= $args['title'] ?></h2>

    <?php ob_start(); ?>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <?php $args['content'] = ob_get_clean();
    if (strlen(trim($args['content']))): ?>
        <div class="GridSection-text">
            <?= $args['content'] ?>
        </div>
    <?php
    endif;
    $cards = $args['cards'];
    include(base_path("resources/views/partials/card_grid.php"));
    ?>
    </div><!-- // END .GridSection-container -->
    </div><!-- // END .GridSection -->
<?php endif; ?>