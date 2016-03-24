<?php

/* @var $directive array */

// Exit if no profiles
if (!isset($directive["args"]['profiles']) OR count($directive["args"]['profiles']) === 0) {
    return;
}

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title'          => '',
            'id'             => '',
            'class'          => '',
            'profiles'       => [],
            'footer_buttons' => []
        ], $directive["args"]
    );
    $args['class'] = trim('ProfilesSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div id="<?= $args['id'] ?>" class="<?= $args['class'] ?>">
    <div class="ProfilesSection-container">
    <h2 class="ProfilesSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <ul class="ProfilesSection-grid">
        <?php foreach ($args['profiles'] as $profile): ?>
            <li class="ProfilesSection-item">
                <a id="<?= $profile->profile_link_id ?>" class="ProfilesSection-card" href="<?= $profile->profile_url ?>">
                    <img
                        class="ProfilesSection-photo lazyload"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-srcset="
                            <?= resized_image_url($profile->image, 1280, 'square') ?> 1280w,
                            <?= resized_image_url($profile->image, 800, 'square') ?> 800w,
                            <?= resized_image_url($profile->image, 480, 'square') ?> 480w
                        "
                        sizes="25vw">
                    <span class="ProfilesSection-name"><?= $profile->profile_name ?></span>
                    <span class="ProfilesSection-profileTitle"><?= $profile->profile_title ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php if (!empty($args['footer_buttons'])): ?>
        <div class="ProfilesSection-footerButtons">
            <?php foreach ($args['footer_buttons'] as $button): ?>
                <a class="Button" href="<?= $button['url']; ?>"><?= $button['title']; ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div><!-- // END .ProfilesSection-container -->
    </div><!-- // END .ProfilesSection -->
<?php endif; ?>