<?php

/* @var $directive array */

// Exit if no profiles
if (!isset($directive["args"]['profiles']) OR count($directive["args"]['profiles']) === 0) {
    return;
}

if ($directive['execution_mode'] == 'start'):

    $args = array_merge(
        [
            'title' => '',
            'id' => '',
            'class' => '',
            'profiles' => []
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
                <a class="ProfilesSection-card" href="<?= $profile->profile_url ?>">
                    <span class="ProfilesSection-photo b-lazy"
                        data-src-sm="<?= cdn_image('sm', 'half', $profile->image, 'square') ?>"
                        data-src-md="<?= cdn_image('md', 'half', $profile->image, 'square') ?>"
                        data-src-lg="<?= cdn_image('lg', 'half', $profile->image, 'square') ?>"
                        data-src="<?= cdn_image('xl', 'third', $profile->image, 'square') ?>"></span>
                    <span class="ProfilesSection-name"><?= $profile->profile_name ?></span>
                    <span class="ProfilesSection-profileTitle"><?= $profile->profile_title ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    </div><!-- // END .ProfilesSection-container -->
    </div><!-- // END .ProfilesSection -->
<?php endif; ?>