<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\Organization;

class OrganizationsController extends Controller {

    public function index()
    {
        $result = [];
        $items = Organization::all();

        foreach ($items as $item) {

            $result[] = [
                'postDate'           => $item->created_at,
                'enabled'            => $item->deleted_at ? 0 : 1,
                'slug'               => $item->slug,
                'title'              => $item->name,
                'area'               => $item->location,
                'description'        => $item->description,
                'contact_first_name' => substr($item->contact, 0, strpos($item->contact, ' ')),
                'contact_last_name'  => substr($item->contact, strpos($item->contact, ' ')),
                'email'              => $item->email,
                'phone'              => $item->phone,
                'website'            => $item->website,
            ];
        }

        return $result;
    }

}
