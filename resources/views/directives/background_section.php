<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = $directive['args'];
    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'image' => '',
            'image_class' => uniqid('bg_'),
            'buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('BackgroundSection ' . $args["image_class"] . ' ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <style type="text/css" scoped>
        .<?= $args["image_class"]; ?> { background-image: url(<?= $args["image"]; ?>); }
    </style>
    <div class="<?= $args['class'] ?>">
    <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
    <h2 class="BackgroundSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .BackgroundSection-text -->
    <?php if(count($args["buttons"])): ?>
        <p>
            <?php foreach($args["buttons"] as $button): ?>
                <a class="Button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    </div><!-- // END .BackgroundSection-container -->
    </div><!-- // END .BackgroundSection -->
<?php endif; ?>