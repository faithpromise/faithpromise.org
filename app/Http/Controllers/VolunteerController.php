<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Ministry;
use App\Staff;
use App\VolunteerSkill;
use App\Http\Requests\VolunteerPositionRequest;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends BaseController {

    public function index() {

        return view('serve');

    }

    public function positions() {

        return view('volunteer_positions');

    }

    public function positionsJson(Request $request) {

        $by = $request->input('by', 'ministry');

        if ($by === 'ministry') {
            return Ministry::has('volunteer_positions')->with('volunteer_positions')->orderBy('title')->get();
        } else {
            return VolunteerSkill::has('volunteer_positions')->with('volunteer_positions')->get();
        }

    }

    public function sendMessage(VolunteerPositionRequest $request) {

        $data = $request->all();
        $data['campus'] = Campus::find($data['campus'])->name;
        $data['sent_at'] = Carbon::now()->format('D, M j, Y at g:i A');
        $data['phone'] = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $data['phone']);

        $recipient = Staff::findBySlug('miles-creasman');
        $recipient2 = Staff::findBySlug('macy-deel');

        Mail::queue('emails.volunteer_request', $data, function ($message) use ($data, $recipient, $recipient2) {

            $full_name = $data['first_name'] . ' ' . $data['last_name'];
            $subject = 'Ministry Volunteer' . (empty($data['subject']) ? '' : (' - ' . $data['subject']));

            $message
                ->from('noreply@faithpromise.org', 'Faith Promise Website')
                ->replyTo($data['email'], $full_name)
                ->subject($subject)
                ->to($recipient->email, $recipient->name)
                ->cc($recipient2->email, $recipient2->name);
        });

    }

}
