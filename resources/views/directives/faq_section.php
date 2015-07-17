<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'faq' => []
        ], $directive["args"]
    );
    $css_class = trim('Faq ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $css_class ?>">
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
            <h3 class="Faq-question"><?= $f['q']; ?></h3>

            <div class="Faq-answer">
                <?= $f['a']; ?>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    </div><!-- // END .Faq-container -->
    </div><!-- // END .Faq -->
<?php endif; ?>