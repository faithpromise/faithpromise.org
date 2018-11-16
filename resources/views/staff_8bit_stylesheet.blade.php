<?php

    $num_staff = count($staff);
    $increment = 150;
    $offset = 0;

foreach($staff as $key => $member):
?>
/* Total: <?= $num_staff ?> */
._8bit-<?= $member->slug; ?> {
    background-position: 0 -<?= $offset; ?>px;
}

<?php
    $offset = $offset + $increment;
endforeach;