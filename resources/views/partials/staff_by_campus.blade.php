<?php
    $staff_gallery_class = 'StaffSection--square Section--lightGrey';
    $grey_bg = 0;
        // TODO: delete this once campus pages are set up
?>

@foreach ($campuses as $campus)
    <?php $staff_gallery_class = (($grey_bg = 1-$grey_bg) === 0) ? 'StaffSection--square Section--lightGrey' : 'StaffSection--square'; ?>
    @include('partials.staff_gallery', ['staff' => $campus->Staff, 'title' => $campus->name, 'class' => $staff_gallery_class])
@endforeach