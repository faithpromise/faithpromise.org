<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class RedirectController extends BaseController {

    public function care() {
        return redirect()->route('care');
    }

    public function dedications() {
        return redirect()->route('dedications');
    }

    public function h4h() {
        return redirect()->route('h4h');
    }

    public function events() {
        return redirect()->route('events');
    }

    public function sermons() {
        return redirect()->route('sermons');
    }

    public function seriesPromo($series_slug) {
        return redirect()->route('seriesVideo', ['series' => $series_slug, 'series_video' => 'promo']);
    }

    public function seriesPromo2($series_slug) {
        return redirect()->route('seriesVideo', ['series' => $series_slug, 'series_video' => 'promo-2']);
    }

    public function nextSteps() {
        return redirect()->route('nextSteps');
    }

    public function celebrate() {
        return redirect()->route('celebrate');
    }

    public function locations() {
        return redirect()->route('locations');
    }

    public function biblePlan() {
        return redirect()->route('biblePlan');
    }

    public function youngAdults() {
        return redirect()->route('youngAdults');
    }

    public function groupLeaders() {
        return redirect()->route('groupLeaders');
    }

    public function newGroupLeader() {
        return redirect()->route('newGroupLeader');
    }

    public function loveLocal() {
        return redirect()->route('loveLocal');
    }

    public function kidSteps() {
        return redirect()->route('kidSteps');
    }

    public function fpKids() {
        return redirect()->route('fpKids');
    }

    public function groups() {
        return redirect()->route('groups');
    }

    public function kidsHope() {
        return redirect()->route('localOutreachOrganization', ['organization' => 'kids-hope-usa']);
    }

    public function allStaff() {
        return redirect('http://www.faithpromiseweb.com/allstaff/');
    }

    public function campusPastors() {
        return redirect('http://faithpromiseweb.com/campuspastors');
    }

    public function gMail() {
        return redirect('http://gmail.google.com/a/faithpromise.org');
    }

    public function lessons() {
        return redirect('http://blog.faithpromise.org/category/groups-ministry/discussion-questions/');
    }

    public function requests() {
        return redirect('http://www.faithpromiseweb.com/request/');
    }

    public function feedback() {
        return redirect('https://docs.google.com/forms/d/1laaJ_c7rl2Q_kiXb-PgdqQFI1emn2B7W7YMQeBXxSTQ/viewform');
    }

    public function icampus() {
        return redirect('http://icampus.faithpromise.org');
    }

    public function app() {
        return redirect('http://get.theapp.co/9749');
    }

    public function retirees() {
        return redirect('https://docs.google.com/forms/d/1xw0_J0djgHZIr8NwBmiINzErY-e7Ond0LbCI6IfO-6s/viewform');
    }

    public function candidates() {
        return redirect('https://docs.google.com/forms/d/1oqRSKaNPATyHhbWvKejL8udI74gJFgO73Qv7sUeEndU/viewform');
    }

}
