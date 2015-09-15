<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use App\FaithPromise\Stylesheet;
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
        $staff_8bit_css_path = config('site.cdn_url') . '/staff-8bit.css?v=' . md5(serialize($staff_8bit->toArray()));

        $stylesheets = [
            Stylesheet::make($staff_8bit_css_path . '&size=mobile')->setMedia('(max-width: 480px)'),
            Stylesheet::make($staff_8bit_css_path . '&size=tablet')->setMedia('(min-width: 481px) and (max-width: 720px)'),
            Stylesheet::make($staff_8bit_css_path . '&size=desktop')->setMedia('(min-width: 721px)')
        ];

        return view('staff', [
            'teams'       => $staff_by_teams,
            'campuses'    => $campuses,
            'staff_8bit'  => $staff_8bit->shuffle(),
            'stylesheets' => $stylesheets
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

    public function detail($member) {

        $teams = $member->teams;
        $team = $teams->last(); // LATER: Figure out what to do for multiple teams. Last because exec vs worship (ex. Michele)
        $staff = $team->Staff->filter(function ($item) use ($member) {
            return $item->id <> $member->id;
        });

        return view('staff_detail', [
            'member' => $member,
            'teams'  => $teams,
            'team'   => $team,
            'staff'  => $staff
        ]);

    }

    public function eightBitJson() {
        $staff_8bit = $this->getEightBit()->lists('slug')->toArray();

        return response()->json($staff_8bit);
    }

    public function eightBitCss() {
        $staff_8bit = $this->getEightBit();
        $content = View::make('staff_8bit_stylesheet', [
            'staff' => $staff_8bit
        ]);
        $response = Response::make($content);

        return $response->header('Content-Type', 'text/css');
    }

    private function getEightBit() {
        $cache_key = 'staff_8bit_1';
        $staff_8bit = Cache::remember($cache_key, 0, function () {
            $staff = Staff::select('slug')->get();
            $result = $staff->filter(function ($item) {
                return asset_exists($item->{"EightBitPath"});
            });

            return $result;
        });

        return $staff_8bit;
    }
}
