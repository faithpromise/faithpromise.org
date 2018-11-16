<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use Vimeo\Vimeo;

class VideosController extends Controller {

    public function updateVimeo(Request $request) {

        $lib = new Vimeo('d29342f4f27a5ec7034fcdbfaee27c3e50530452', 'c9eyHulbFURo+tbwyhBpWaU86x3rRVA8Hg4Ag0PMfnMkKBkhjE7L4sNgsqZOPSwbGvZPOq5qogzhqPzLBQmVDCtVSBWyVK6lZwON63OjPGKb7J0erwp9Yl6n68/R2XSD');
        $redirect_url = url('/vimeo');
        $url = $lib->buildAuthorizationEndpoint($redirect_url, ['private','video_files'], 'fp2016');

        if ($request->get('code')) {
            $token = $lib->accessToken($request->get('code'), $redirect_url);
            Cache::put('vimeo_token', $token['body']['access_token'], 1440);
        }

        if (!Cache::has('vimeo_token')) {
            return redirect($url);
        }

        $lib->setToken(Cache::get('vimeo_token'));

//        $response = $lib->request('/me/videos', ['per_page' => 50, 'page' => $page]);

        $count = Video::whereNotNull('vimeo_id')->whereNull('vimeo_file_hd')->whereNull('vimeo_file_stream')->count();

        var_dump($count . ' left...');

        $videos = Video::whereNotNull('vimeo_id')->whereNull('vimeo_file_hd')->whereNull('vimeo_file_stream')->limit(25)->get();

        foreach ($videos as $video) {

            $response = $lib->request('/me/videos/' . $video->vimeo_id);
            $vimeo_video = $response['body'];

            $hd = last(
                array_sort(array_where($vimeo_video['files'], function($key, $file) {
                    return in_array($file['quality'], ['sd','hd']);
                }), function($key, $file) {
                    return $file['size'];
                })
            )['link_secure'];
            $hd = preg_replace('/&oauth2_token_id=.*$/', '', $hd);

            $hls = last(
                array_sort(array_where($vimeo_video['files'], function($key, $file) {
                    return $file['quality'] == 'hls';
                }), function($key, $file) {
                    return $file['size'];
                })
            )['link_secure'];
            $hls = preg_replace('/&oauth2_token_id=.*$/', '', $hls);

            $video->vimeo_file_hd = $hd;
            $video->vimeo_file_stream = $hls;

            $video->save();

            var_dump($video->title);

        };

        return '<a href="/vimeo">Refresh</a>';

    }

}
