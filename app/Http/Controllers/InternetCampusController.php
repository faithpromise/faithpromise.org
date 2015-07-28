<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class InternetCampusController extends BaseController {

    public function countdown() {

        if (App::environment('local')) {
            \Debugbar::disable();
        }

        // TODO: Test out the cache

        $key = 'icampus_countdown3';
        $countdown = Cache::get($key);

        if ($countdown === null):

            $countdown = [];
            $data = json_decode(file_get_contents('http://icampus.faithpromise.org/api/v1/events/current'), true);

            if ($data['meta']['status'] !== 200) {
                // TODO: hmm...
            }

            $countdown['start_utc'] = Carbon::parse($data['response']['item']['eventStartTime']);
            $countdown['start_local'] = $countdown['start_utc']->copy()->setTimezone('America/New_York');
            $countdown['is_live'] = $data['response']['item']['isLive'];
            $countdown['expire_utc'] = $countdown['start_utc']->copy()->addMinutes(60);

            $countdown['json'] = json_encode(array(
                "start_utc" => $countdown['start_utc']->timestamp * 1000,
                "start"     => $countdown['start_local']->timestamp * 1000,
                "is_live"   => $data['response']['item']['isLive']
            ));

            Cache::put($key, $countdown, $countdown['expire_utc']);

        endif;

        return response($countdown['json'])->header('Expires', $countdown['expire_utc']->format('D, d M Y H:i:s \G\M\T'));
    }

}
