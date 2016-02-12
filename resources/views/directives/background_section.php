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
    $args['class'] = trim('BackgroundSection ' . (isset($args['class']) ? $args['class'] : '')); ?>
    <!--
        1.  Even though we are displaying the background full width, we really don't need to load a
            higher res on smaller viewports because there is a black overlay on top of the image.
    -->
    <div class="<?= $args['class'] ?>">
        <?php if($args['image']): ?>
        <div class="BackgroundSection-imageWrap">
            <img
                class="BackgroundSection-image lazyload"
                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                data-srcset="
                    <?= resized_image_url($args['image'], 1920, 'wide') ?> 1920w,
                    <?= resized_image_url($args['image'], 1680, 'wide') ?> 1680w,
                    <?= resized_image_url($args['image'], 1280, 'wide') ?> 1280w,
                    <?= resized_image_url($args['image'], 800, 'wide') ?> 800w,
                    <?= resized_image_url($args['image'], 480, 'wide') ?> 480w,
                    <?= resized_image_url($args['image'], 320, 'wide') ?> 320w,
                "
                sizes="
                    (max-width: 760px) 50vw,<? // 1. ?>
                    100vw
                "
            >
        </div>
        <?php endif; ?>

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