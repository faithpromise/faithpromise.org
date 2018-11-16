<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Staff;
use Illuminate\Routing\Controller as BaseController;

class StaffController extends BaseController {

    public function index() {
        return view('students/staff', [
            'staff'       => Staff::student()->get()
        ]);
    }

    public function detail($slug) {

        $member = Staff::findBySlug($slug);

        $staff = Staff::student()->get()->filter(function ($item) use ($member) {
            return $item->id <> $member->id;
        });

        return view('students/staff_detail', [
            'member' => $member,
            'staff'  => $staff
        ]);

    }
}
