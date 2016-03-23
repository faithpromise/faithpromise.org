<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'class' => '',
            'video' => '',
            'youtube' => '',
            'buttons' => []
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
    <?php if (count($args["buttons"])): ?>
        <p class="VideoSection-buttons">
            <?php foreach ($args["buttons"] as $button): ?>
                <a class="Button VideoSection-button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    </div><!-- // END .VideoSection-text -->
    <div class="VideoSection-video">
        <?php if ($args['video']): ?>
        <vimeo id="<?= $args['video']; ?>"></vimeo>
        <?php endif; ?>
        <?php if ($args['youtube']): ?>
            <div class="VideoPlayer">
                <iframe src="https://www.youtube.com/embed/<?= $args['youtube'] ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        <?php endif; ?>
    </div><!-- // END .VideoSection-video -->
    </div><!-- // END .VideoSection-wrap -->
    </div><!-- // END .VideoSection-container -->
    </div><!-- // END .VideoSection -->
<?php endif; ?>