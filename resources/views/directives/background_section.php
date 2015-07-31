<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = $directive['args'];
    $args = array_merge(
        [
            'title'   => '',
            'class'   => '',
            'image'   => '',
            'buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('BackgroundSection b-lazy ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div
    class="<?= $args['class'] ?>"
    data-src-sm="<?= cdn_image('sm', 'full', $args["image"]) ?>"
    data-src-md="<?= cdn_image('md', 'full', $args["image"]) ?>"
    data-src-lg="<?= cdn_image('lg', 'full', $args["image"]) ?>"
    data-src="<?= cdn_image('xl', 'full', $args["image"]) ?>">
    <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
    <h2 class="BackgroundSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .BackgroundSection-text -->
    <?php if (count($args["buttons"])): ?>
        <p class="BackgroundSection-buttons">
            <?php foreach ($args["buttons"] as $button): ?>
                <a class="Button BackgroundSection-button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    </div><!-- // END .BackgroundSection-container -->
    </div><!-- // END .BackgroundSection -->
<?php endif; ?>