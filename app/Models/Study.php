<?php

namespace App\Models;


use FaithPromise\Shared\Models\Campus;

class Study extends \FaithPromise\Shared\Models\Study {

    public function getCardTextAttribute() {

        // Avoid re-querying
        if (isset($this->cached_card_text)) {
            return $this->cached_card_text;
        }

        $campus_ids = $this->times->pluck('campus_id');

        $campuses = Campus::whereIn('id', $campus_ids)->get();

        if ($campuses === null) {
            return '';
        }

        $campus_count = $campuses->count();

        switch ($campus_count) {
            case 0:
                $this->cached_card_text = '';
                break;
            case 1:
                $this->cached_card_text = 'Available at the ' . $campuses->first()->full_name;
                break;
            case 2:
                $this->cached_card_text = 'Available at ' . $campuses->first()->name . ' and ' . $campuses->last()->name . ' campuses';
                break;
            default:
                $this->cached_card_text = 'Available at ' . $campuses->take($campus_count-1)->implode('name', ', ') . ', and ' . $campuses->last()->name . ' campuses';
        }

        return $this->cached_card_text;

    }

}