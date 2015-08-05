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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class StaffController extends BaseController {

    public function index() {

        $campuses = Campus::all();
        $staff_by_teams = Team::with('Staff')->get();
        $staff_8bit = $this->getEightBit();

        $staff_8bit_hash = md5(serialize($staff_8bit->toArray()));

        return view('staff', [
            'teams'       => $staff_by_teams,
            'campuses'    => $campuses,
            'staff_8bit'  => $staff_8bit->shuffle(),
            'stylesheets' => ['/staff/8bit.css?v=' . $staff_8bit_hash]
        ]);
    }

    public function directory() {
        $campuses = Campus::all();
        $staff_by_name = Staff::orderBy('first_name')->get();

        return view('staff_directory', [
            'staff'    => $staff_by_name,
            'campuses' => $campuses
        ]);
    }

    public function staffByCampus() {
        $staff_by_campus = Campus::with('Staff')->orderBy('name')->get();

        return view('partials.staff_by_campus', [
            'campuses' => $staff_by_campus
        ]);
    }

    public function detail($staff) {

        $member = Staff::whereIdent($staff)->first();

        if (is_null($member)) {
            abort(404); // TODO: Suggest the staff page
        }

        return view('staff_detail', [
            'member' => $member
        ]);

    }

    public function eightBitJson() {
        $staff_8bit = $this->getEightBit()->lists('ident')->toArray();
        return response()->json($staff_8bit);
    }

    public function eightBitCss() {

        $content = View::make('staff_8bit_stylesheet', [
            'staff' => $this->getEightBit()
        ]);
        $response = Response::make($content);
        return $response->header('Content-Type', 'text/css');
    }

    private function getEightBit() {
        $staff_8bit = Cache::remember('staff_8bites', 7200, function () {
            return Staff::select('ident')->get()->filter(function ($item) {
                return asset_exists($item->{"8bitPath"});
            });
        });
        return $staff_8bit;
    }
}