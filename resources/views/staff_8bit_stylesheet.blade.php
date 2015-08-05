<?php

    $num_staff = count($staff);
    $increment = 100/$num_staff;
    $offset = 0;

foreach($staff as $key => $member):
?>
._8bit-<?= $member->ident; ?> {
    background-position: 0 <?= $offset; ?>%;
}

<?php
    $offset = $offset + $increment;
endforeach;