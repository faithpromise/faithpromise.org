<?php

namespace App\Models;


use FaithPromise\Shared\Models\Campus;

class Study extends \FaithPromise\Shared\Models\Study {

    public function getCardTextAttribute() {

        $campus_ids = $this->times->pluck('campus_id');

        $campuses = Campus::whereIn('id', $campus_ids)->get();

        if ($campuses === null) {
            return '';
        }

        $campus_count = $campuses->count();

        switch ($campus_count) {
            case 0:
                return '';
            case 1:
                return 'Available at the ' . $campuses->first()->full_name;
            case 2:
                return 'Available at ' . $campuses->first()->name . ' and ' . $campuses->last()->name . ' campuses';
            default:
                return 'Available at ' . $campuses->take($campus_count-1)->implode('name', ', ') . ', and ' . $campuses->last()->name . ' campuses';
        }

    }

}