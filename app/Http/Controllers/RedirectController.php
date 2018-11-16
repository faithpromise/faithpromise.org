<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class RedirectController extends BaseController {

    public function alignments() {
        return redirect()->route('groupAlignments');
    }

    public function shortTermGroups() {
        return redirect()->route('studies');
    }

    public function shortTermGroup($study_slug) {
        return redirect()->route('studyDetail', ['study' => $study_slug]);
    }

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

    public function fpStudents() {
        return redirect()->route('fpStudents');
    }

    public function groups() {
        return redirect()->route('groups');
    }

    public function fpKidsWorship() {
        return redirect()->route('fpKidsWorship');
    }

    public function kidsHope() {
        return redirect()->route('localOutreachOrganization', ['organization' => 'kids-hope-usa']);
    }

    public function allStaff() {
        return redirect('http://www.faithpromiseweb.com/allstaff/');
    }

    public function campusPastors() {
        return redirect('https://www.youtube.com/playlist?list=PL0Bp_DH7BS_kCR2hqcEieCMYmmZcau78m');
    }

    public function gMail() {
        return redirect('http://gmail.google.com/a/faithpromise.org');
    }

    public function lessons() {
        return redirect('http://blog.faithpromise.org/category/groups-ministry/discussion-questions/');
    }

    public function requests() {
        return redirect('http://admin.faithpromise.org/requests/new');
    }

    public function feedback() {
        return redirect('https://docs.google.com/forms/d/1Kvu9xsqKZwXtH2rpMSD849ykUssf-Yaupj9xr4q9NDo/viewform');
    }

    public function icampus() {
        return redirect('http://online.faithpromise.org');
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

    public function rsvp() {
        return redirect('https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=PJyvi4Gp7wW9IndW/tDB+A==&cCode=RtKBDolfiPuZJp8o1+0ARA==');
    }

    public function macyScarbrough() {
        return redirect('/staff/macy-scarbrough');
    }

    public function fifteenYearTransformation() {
        return redirect('/series/fifteen-year-anniversary/transformation');
    }

    public function fpKidsCamp() {
        return redirect('/fpkids/camp');
    }

    public function survey() {
        return redirect('https://www.dropbox.com/request/usCGEgVjDxQBuGRxgoTW');
    }

    public function operations() {
        return redirect('/events/operations-team-appreciation');
    }

    public function share() {
        return redirect('http://goo.gl/forms/BjWaj111d3');
    }

    public function sermonPlanningDoc() {
        return redirect('https://docs.google.com/spreadsheets/d/1RxpnSoGQFgNbGAJAY-1BiZINNcngTpEEn3aa0Nu9L1w/edit?usp=sharing');
    }

    public function fusion() {
        return redirect('/fpstudents/fusion');
    }

    public function dinner() {
        return redirect('https://www.cognitoforms.com/FaithPromiseChurch/NorthKnoxCoreMembersDinner');
    }

}
