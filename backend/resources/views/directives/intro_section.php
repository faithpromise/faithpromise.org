<?php

/* @var $directive array */

if ($directive['execution_mode'] == 'start') {

    $args = array_merge(
        [
            'title'   => '',
            'class'   => '',
            'buttons' => []
        ], $directive["args"]
    );

    ob_start();
}

if ($directive['execution_mode'] == 'end'):

    $content = ob_get_clean();

    $args['class'] = trim('IntroSection ' . (isset($args['class']) ? $args['class'] : ''));
    $args['push_title'] = isset($args['push_title']) ? $args['push_title'] : strlen($content) > 100;

    $title_class = $args['push_title'] ? 'IntroSection-title' : '';
    ?>

    <div class="<?= $args['class'] ?>">
        <div class="IntroSection-container">
            <div class="IntroSection-text">
                <h2 class="IntroSection-title <?= $title_class ?>"><?= $args['title'] ?></h2>
                <?= $content ?>
            </div>
            <!-- // END .IntroSection-text -->
            <?php if (count($args["buttons"])): ?>
                <p class="IntroSection-buttons">
                    <?php foreach ($args["buttons"] as $button):

                        $tag = isset($button['url']) ? 'a' : 'span';
                        $button['attributes'] = isset($button['attributes']) ? $button['attributes'] : '';
                        if (isset($button['url'])) {
                            $button['attributes'] .= ' href="' . $button['url'] . '"';
                            $button['attributes'] .= ' target="' . (isset($button['target']) ? $button['target'] : '_self') . '"';
                        }

                        ?>
                        <<?= $tag ?> class="Button IntroSection-button" <?= $button['attributes']; ?>><?= $button["title"]; ?></<?= $tag ?>>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>
        <!-- // END .IntroSection-container -->
    </div><!-- // END .IntroSection -->
<?php endif; ?>