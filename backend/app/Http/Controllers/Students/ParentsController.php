<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\Staff;
use \Illuminate\Routing\Controller as BaseController;

class ParentsController extends BaseController {

    public function index() {
        return view('students/parents', [
            'news' => Post::byLocation('parent-news')->get(),
            'staff' => Staff::student()->get()
        ]);
    }

    public function resources() {
        return view('students/parent-resources', [
            'books' => Post::byLocation('books-for-parents-of-students')->whereType('book')->orderBy('sort')->get()
        ]);
    }

}
