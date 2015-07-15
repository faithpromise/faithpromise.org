<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Routing\Controller as BaseController;

class EventsController extends BaseController
{

    public function index()
    {
        $events = Event::all();

        return view('events', [
            'events' => $events
        ]);
    }

}