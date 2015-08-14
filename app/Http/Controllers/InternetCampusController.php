<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class InternetCampusController extends BaseController {

    public function countdown() {

        if (App::environment('local')) {
            \Debugbar::disable();
        }

        // LATER: Test out the cache

        $api_uri = 'http://icampus.faithpromise.org/api/v1/events/current';
        $key = 'icampus_countdown3';
        $countdown = Cache::get($key);
        $http_client = new HttpClient();

//        $test_start = Carbon::now()->addSeconds(10);
//        $test = [
//            'start_utc' => ($test_start->timestamp * 1000),
//            'start' => ($test_start->copy()->setTimezone('America/New_York')->timestamp * 1000),
//            'is_live' => false
//        ];
//        return response(json_encode($test));

        if ($countdown === null OR App::environment('local')):

            $countdown = [];
            $icampus_result = $http_client->get($api_uri, ['connect_timeout' => 5]);

            try {
                $data = json_decode($icampus_result->getBody());

                if ($icampus_result->getStatusCode() !== 200 OR !isset($data->meta->status) OR $data->meta->status !== 200) {
                    //  LATER: Log this
                    throw new \Exception('Call to iCampus API was not successful');
                }
            } catch (\Exception $e) {
                $expire = Carbon::now()->addMinutes(5);

                return response('', 500)->header('Expires', $expire);
            }

            $countdown['start_utc'] = Carbon::parse($data->response->item->eventStartTime);
            $countdown['start_local'] = $countdown['start_utc']->copy()->setTimezone('America/New_York');
            $countdown['expire_utc'] = $countdown['start_utc']->copy()->addMinutes(60);

            $countdown['json'] = json_encode(array(
                "start_utc" => $countdown['start_utc']->timestamp * 1000,
                "start"     => $countdown['start_local']->timestamp * 1000,
                "is_live"   => $data->response->item->isLive
            ));

            Cache::put($key, $countdown, $countdown['expire_utc']);

        endif;

        return response($countdown['json'])->header('Expires', $countdown['expire_utc']->format('D, d M Y H:i:s \G\M\T'));
    }

}
