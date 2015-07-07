<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{

    public function index()
    {

    }

    public function staff()
    {

        $staff_by_teams = \App\Team::with('Staff')->get();

        return view('staff', [
            'teams' => $staff_by_teams->toArray()
        ]);
    }

}