<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'id' => 'id_' . uniqid(),
            'title' => '',
            'class' => '',
            'buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('TextSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div id="<?= $args['id'] ?>" class="<?= $args['class'] ?>">
    <div class="TextSection-container">
    <div class="TextSection-text">
    <h2 class="TextSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    </div><!-- // END .TextSection-text -->
    <?php if (count($args["buttons"])): ?>
        <p class="TextSection-buttons">
            <?php foreach ($args["buttons"] as $button): ?>
                <a class="Button TextSection-button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    </div><!-- // END .TextSection-container -->
    </div><!-- // END .TextSection -->
<?php endif; ?>