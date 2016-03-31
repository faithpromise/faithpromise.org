<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use App\FaithPromise\Stylesheet;
use FaithPromise\Shared\Models\Staff;
use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Team;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;

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

    public function detail($slug) {

        $member = Staff::findBySlug($slug);

        if (!$member) {
            abort(404);
        }

        $teams = $member->teams;
        $team = $teams->last(); // LATER: Figure out what to do for multiple teams. Last because exec vs worship (ex. Michele)
        $staff = $team === null ? [] : $team->Staff->filter(function ($item) use ($member) {
            return $item->id <> $member->id;
        });

        return view('staff_detail', [
            'member' => $member,
            'teams'  => $teams,
            'team'   => $team,
            'staff'  => $staff
        ]);

    }

    public function eightBitCss(Request $request) {

        $css = [];
        $staff = $this->getEightBit()->pluck('slug')->toArray();
        $size = $request->input('size', 'desktop');
        $icon_width = $this->getIconSize($size);
        $max_age_days = 30;

        for ($i = 0; $i < count($staff); ++$i) {

            $path = asset_path('images/staff/' . $staff[$i] . '-8bit-square.jpg');
            $staff_image = Image::make($path)->resize($icon_width, $icon_width);
            $css[] = '.Staff8bit-' . $staff[$i] . ' { background-image:url(' . $staff_image->encode('data-url')->getEncoded() . '); }';
        }

        $response = Response::make(implode("\n", $css));
        $response->header('Cache-Control', 'max-age=' . ($max_age_days * 24 * 60 * 60) . ', public');
        $response->header('Content-Type', 'text/css');

        return $response;

    }

    private function getIconSize($size) {
        $sizes = [
            'mobile'  => 45,
            'tablet'  => 70,
            'desktop' => 120
        ];

        return $sizes[$size];
    }

    private function getEightBit() {
        $cache_key = 'staff_8bit_3';
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
