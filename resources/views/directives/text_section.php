<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = $directive['args'];
    $css_class = trim('TextSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $css_class ?>">
    <div class="TextSection-container">
    <div class="TextSection-text">
    <h2 class="TextSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .TextSection-text -->
    </div><!-- // END .TextSection-container -->
    </div><!-- // END .TextSection -->
<?php endif; ?>