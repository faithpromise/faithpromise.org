<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Staff;
use App\VolunteerSkill;
use App\Http\Requests\VolunteerPositionRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends BaseController {

    public function index() {

        return view('serve');

    }

    public function positions() {

        return view('volunteer_positions_temp');

    }

    public function positionsJson() {

        return $skills = VolunteerSkill::with('positions')->get();

    }

    public function sendMessage(VolunteerPositionRequest $request) {

        $data = $request->all();
        $data['campus'] = Campus::find($data['campus'])->name;

//        $recipient = Staff::findBySlug('miles-creasman');
//        $recipient2 = Staff::findBySlug('macy-deel');
        $recipient = Staff::findBySlug('brad-roberts');
        $recipient2 = Staff::findBySlug('brad-roberts');

        Mail::queue('emails.volunteer_request', $data, function($message) use ($data, $recipient, $recipient2) {

            $full_name = $data['first_name'] . ' ' . $data['last_name'];

            $message
                ->from('noreply@faithpromise.org', 'Faith Promise Website')
                ->replyTo($data['email'], $full_name)
                ->subject('Volunteer Request: ' . $full_name)
                ->to($recipient->email, $recipient->name);
        });

    }

}
