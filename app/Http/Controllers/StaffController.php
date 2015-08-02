<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use App\Staff;
use App\Campus;
use App\Team;
use Illuminate\Routing\Controller as BaseController;

class StaffController extends BaseController
{

    public function index()
    {

        $campuses = Campus::all();
        $staff_by_teams = Team::with('Staff')->get();

        return view('staff', [
            'teams' => $staff_by_teams,
            'campuses' => $campuses
        ]);
    }

    public function directory()
    {
        $campuses = Campus::all();
        $staff_by_name = Staff::orderBy('first_name')->get();

        return view('staff_directory', [
            'staff' => $staff_by_name,
            'campuses' => $campuses
        ]);
    }

    public function staffByCampus()
    {
        $staff_by_campus = Campus::with('Staff')->orderBy('name')->get();

        return view('partials.staff_by_campus', [
            'campuses' => $staff_by_campus
        ]);
    }

}