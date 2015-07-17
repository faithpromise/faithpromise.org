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
            'class' => '',
            'profiles' => []
        ], $directive["args"]
    );
    $args['class'] = trim('ProfilesSection ' . (isset($args['class']) ? $args['class'] : '')); ?>

    <div class="<?= $args['class'] ?>">
    <div class="ProfilesSection-container">
    <h2 class="ProfilesSection-title"><?= $args['title'] ?></h2>

<?php endif; ?>

<?php if ($directive['execution_mode'] == 'end'): ?>
    <ul class="ProfilesSection-grid">
        <?php foreach ($args['profiles'] as $profile): ?>
            <li class="ProfilesSection-item">
                <a class="ProfilesSection-card" href="<?= $profile->profile_url ?>">
                    <span class="ProfilesSection-photo" data-layzr="<?= $profile->profile_image ?>" data-layzr-bg></span>
                    <span class="ProfilesSection-name"><?= $profile->profile_name ?></span>
                    <span class="ProfilesSection-profileTitle"><?= $profile->profile_title ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    </div><!-- // END .ProfilesSection-container -->
    </div><!-- // END .ProfilesSection -->
<?php endif; ?>