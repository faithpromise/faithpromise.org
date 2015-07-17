<?php

/* @var $site array */
/* @var $directive array */

$args = $directive['args'];

$css_class = trim('ProfilesSection ' . (isset($args['class']) ? $args['class'] : ''));
$args['title'] = isset($args['title']) ? $args['title'] : ''; // TODO: Try ?:

?>

<?php if ($directive['execution_mode'] == 'start'): ?>
    <div class="<?= $css_class ?>">
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