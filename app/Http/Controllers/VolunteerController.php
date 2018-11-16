<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Ministry;
use FaithPromise\Shared\Models\Staff;
use FaithPromise\Shared\Models\VolunteerSkill;
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
            return Ministry::has('volunteer_positions')->with('volunteer_positions.skills')->orderBy('title')->get();
        } else {
            return VolunteerSkill::has('volunteer_positions')->with('volunteer_positions')->get();
        }

    }

    public function sendMessage(VolunteerPositionRequest $request) {

        $data = $request->all();
        $data['campus'] = Campus::find($data['campus'])->name;
        $data['sent_at'] = Carbon::now()->format('D, M j, Y at g:i A');
        $data['phone'] = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $data['phone']);

        $to = null;
        $cc = [];

        // Hidden field probably means spam
        if (isset($data['flytrap'])) {
            $data['subject'] = 'SPAM? --' . $data['subject'];
            $to = Staff::findBySlug('brad-roberts');
        } else {
            $to = Staff::findBySlug('penny-spivey');
            $cc[] = Staff::findBySlug('brad-roberts');
        }

        Mail::queue('emails.volunteer_request', $data, function ($message) use ($data, $to, $cc) {

            $full_name = $data['first_name'] . ' ' . $data['last_name'];
            $subject = 'Ministry Volunteer' . (empty($data['subject']) ? '' : (' - ' . $data['subject']));

            $message
                ->from('noreply@faithpromise.org', 'Faith Promise Website')
                ->replyTo($data['email'], $full_name)
                ->subject($subject)
                ->to($to->email, $to->name);

            if (count($cc) > 0) {
                foreach($cc as $recipient) {
                    $message->cc($recipient->email, $recipient->name);
                }
            }
        });

    }

}
