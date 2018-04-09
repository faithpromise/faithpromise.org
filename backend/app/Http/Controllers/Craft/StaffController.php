<?php

namespace App\Http\Controllers\Craft;

use FaithPromise\Shared\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller {

    public function index(Request $request) {

        $limit = $request->get('limit', null);
        $page = $request->get('page', null);
        $offset = $limit ? ($page - 1) * $limit : 0;

        $result = [];
        $staff = Staff::withTrashed()->with('campus')->with('teams')->with('ministries')->orderBy('id', 'desc')->limit($limit)->offset($offset)->get();

        $ministries_map = [
            'executive'      => 'executive',
            'pastors'        => 'campus-pastors',
            'kids'           => 'kids',
            'students'       => 'students',
            'groups'         => 'groups',
            'missions'       => 'missions',
            'next-steps'     => 'next-steps',
            'worship'        => 'worship',
            'administration' => 'operations',
            'care'           => 'care',
            'celebrate'      => 'care',
        ];

        foreach ($staff as $staffer) {

            $ministries = [];

            $combined = array_merge($staffer->teams->pluck('slug')->toArray(), $staffer->ministries->pluck('slug')->toArray());

            foreach ($combined as $slug) {
                if (array_search($slug, $ministries) === false && array_key_exists($slug, $ministries_map)) {
                    $ministries[] = $ministries_map[$slug];
                }
            }

            $result[] = [
                'campus'         => $staffer->campus ? $staffer->campus->slug : null,
                'postDate'       => $staffer->created_at->format('Y-m-d'),
                'expiryDate'     => $staffer->deleted_at ? $staffer->deleted_at->format('Y-m-d') : '2050-01-01',
                'slug'           => $staffer->slug,
                'title'          => $staffer->display_name,
                'firstName'      => $staffer->first_name,
                'lastName'       => $staffer->last_name,
                'jobTitle'       => $staffer->title,
                'bio'            => $staffer->bio,
                'email'          => $staffer->email,
                'phoneExtension' => $staffer->phone_ext,
                'facebook'       => $staffer->facebook,
                'instagram'      => $staffer->instagram,
                'twitter'        => $staffer->twitter,
                'categories'     => ['ministries' => $ministries],
                'staffPhoto'     => $staffer->has_image && !$staffer->deleted_at ? 'http://faithpromise.org/' . $staffer->image_path : null,
            ];
        }

        return $result;
    }

}
