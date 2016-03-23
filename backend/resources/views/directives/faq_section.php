<?php

/* @var $directive array */

// Exit if no faq
if (!isset($directive["args"]['faq']) OR count($directive["args"]['faq']) === 0) {
    return;
}

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'image' => '',
            'faq'   => []
        ], $directive["args"]
    );
    $css_class = trim('Faq ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $css_class ?>">
    <?php if (strlen($args['image'])): ?>
    <div class="Faq-imageWrap">
        <img
            class="Faq-image lazyload"
            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
            data-srcset="
                <?= resized_image_url($args['image'], 1920) ?> 1920w,
                <?= resized_image_url($args['image'], 1680) ?> 1680w,
                <?= resized_image_url($args['image'], 1280) ?> 1280w,
                <?= resized_image_url($args['image'], 800) ?> 800w,
                <?= resized_image_url($args['image'], 480) ?> 480w,
                <?= resized_image_url($args['image'], 320) ?> 320w,
            "
            sizes="100vw"
        >
    </div>
<?php endif; ?>
    <div class="Faq-container">
    <h2 class="Faq-title"><?= $args['title'] ?: 'Common Questions' ?></h2>
    <?php ob_start(); ?>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <?php $args['content'] = ob_get_clean();
    if (strlen(trim($args['content']))): ?>
        <div class="Faq-text">
            <?= $args['content'] ?>
        </div>
        <?php
    endif;
    ?>
    <ul class="Faq-grid">
        <?php foreach ($args['faq'] as $f): ?>
            <li class="Faq-item">
                <h3 class="Faq-question"><?= $f->q; ?></h3>

                <div class="Faq-answer">
                    <?= $f->a; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    </div><!-- // END .Faq-container -->
    </div><!-- // END .Faq -->
<?php endif; ?>