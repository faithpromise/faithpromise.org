<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'video' => ''
        ], $directive["args"]
    );
    $args['class'] = trim('VideoSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $args['class'] ?>">
    <div class="VideoSection-container">
    <div class="VideoSection-wrap">
    <div class="VideoSection-text">
    <h2 class="VideoSection-title"><?= $args['title'] ?></h2>
<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .VideoSection-text -->
    <div class="VideoSection-video">
        <vimeo id="<?= $args['video']; ?>"></vimeo>
    </div><!-- // END .VideoSection-video -->
    </div><!-- // END .VideoSection-wrap -->
    </div><!-- // END .VideoSection-container -->
    </div><!-- // END .VideoSection -->
<?php endif; ?>