<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\MissionLocation;
use FaithPromise\Shared\Models\MissionTrip;

class MissionTripsController extends Controller {

    public function index()
    {
        $result = [];
        $items = MissionTrip::withPast()->get();

        foreach ($items as $item) {

            $location = MissionLocation::find($item->mission_location_id);

            if ($location) {
                $result[] = [
                    'postDate'           => $item->created_at,
                    'expiryDate'         => $item->ends_at,
                    'title'              => $item->title,
                    'dates_text'         => $item->dates_text,
                    'cost'               => $item->cost,
                    'description'        => $item->description,
                    'contact_first_name' => substr($item->contact, 0, strpos($item->contact, ' ')),
                    'contact_last_name'  => substr($item->contact, strpos($item->contact, ' ')),
                    'contact_email'      => $item->contact_email,
                    'sold_out'           => $item->is_full,
                    'starts_at'          => $item->starts_at,
                    'ends_at'            => $item->ends_at,
                    'location'           => $location->slug,
                ];
            }
        }

        return $result;
    }

}
