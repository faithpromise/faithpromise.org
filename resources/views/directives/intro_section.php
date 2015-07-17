<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = $directive['args'];
    $css_class = trim('IntroSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $css_class ?>">
    <div class="IntroSection-container">
    <div class="IntroSection-text">
    <h2 class="IntroSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .IntroSection-text -->
    </div><!-- // END .IntroSection-container -->
    </div><!-- // END .IntroSection -->
<?php endif; ?>