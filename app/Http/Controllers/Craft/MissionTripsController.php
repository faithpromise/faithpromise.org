<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\MissionLocation;
use FaithPromise\Shared\Models\MissionTrip;
use Illuminate\Http\Request;

class MissionTripsController extends Controller {

    public function index(Request $request) {

        $limit = $request->get('limit', null);
        $page = $request->get('page', null);
        $offset = $limit ? ($page - 1) * $limit : 0;

        $result = [];
        $items = MissionTrip::withPast()
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->offset($offset)
            ->get();

        foreach ($items as $item) {

            $location = MissionLocation::find($item->mission_location_id);

            if ($location) {
                $result[] = [
                    'slug'               => $location->slug . '-' . $item->id,
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
