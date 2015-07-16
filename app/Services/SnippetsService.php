<?php

namespace App\Services;

use App\Ministry;

class SnippetsService {

    public function ministryStaff($ministry, $title='Meet the Staff', $class='') {

        $min = is_numeric($ministry) ? Ministry::find($ministry) : $ministry;

        return view('partials.staff_gallery', [
            'staff' => $min->staff,
            'title' => $title,
            'class' => $class
        ]);
    }

    public function ministryEvents($ministry, $title='Upcoming Events', $class='') {

        $min = is_numeric($ministry) ? Ministry::find($ministry) : $ministry;

        return view('partials.event_grid', [
            'events' => $min->events,
            'title' => $title,
            'class' => $class
        ]);
    }

}
