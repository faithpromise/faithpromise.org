<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Video;

use App\Http\Requests;

class AppApiController extends Controller {

    public function seriesList() {

        $current_series = Series::currentSeries()->first();
        $series_collection = Series::has('videos')->where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();
        $output = [
            'header' => [
                'title' => 'Sermons'
            ],
            'images' => [
                ['width' => 320, 'url' => open_graph_url_filter(resized_image_url($current_series->image, 320, 'wide'))],
                ['width' => 640, 'url' => open_graph_url_filter(resized_image_url($current_series->image, 640, 'wide'))],
                ['width' => 768, 'url' => open_graph_url_filter(resized_image_url($current_series->image, 768, 'wide'))],
                ['width' => 1536, 'url' => open_graph_url_filter(resized_image_url($current_series->image, 1536, 'wide'))],
            ],
            'items'  => []
        ];

        foreach ($series_collection as $series) {
            $output['items'][] = [
                'title'   => $series->title,
                'actions' => [
                    [
                        'handler' => 'list',
                        'url'     => url(route('app_api_series', $series->slug))
                    ]
                ]
            ];
        }

        return $output;

    }

    public function series($series) {

        $video_collection = Video::with('Series')->with('Speaker')->where('series_id', '=', $series->id)->orderBy('publish_at', 'desc')->get();
        $videos = [];
        $output = [
            'header' => [
                'title' => $series->title,
                'style' => 'banner',
                'items' => [
                    ['width' => 320, 'url' => open_graph_url_filter(resized_image_url($series->image, 320, 'wide'))],
                    ['width' => 640, 'url' => open_graph_url_filter(resized_image_url($series->image, 640, 'wide'))],
                    ['width' => 768, 'url' => open_graph_url_filter(resized_image_url($series->image, 768, 'wide'))],
                    ['width' => 1536, 'url' => open_graph_url_filter(resized_image_url($series->image, 1536, 'wide'))],
                ]
            ]
        ];

        foreach ($video_collection as $video) {
            $videos[] = [
                'title'   => $video->title,
                'images'  => [

                ],
                'actions' => [
                    [
                        'handler' => 'mediaDetail',
                        'url'     => url(route('app_api_series_video', ['series' => $series->slug, 'series_video' => $video->slug]))
                    ]
                ]
            ];
        }

        $output['items'] = $videos;

        return $output;

    }

    public function video($series, $video) {

        $media = [];
        $output = [
            'header' => [
                'title' => 'Sermons'
            ],
            'images' => [
                ['width' => 320, 'url' => open_graph_url_filter(resized_image_url($series->image, 320, 'wide'))],
                ['width' => 640, 'url' => open_graph_url_filter(resized_image_url($series->image, 640, 'wide'))],
                ['width' => 768, 'url' => open_graph_url_filter(resized_image_url($series->image, 768, 'wide'))],
                ['width' => 1536, 'url' => open_graph_url_filter(resized_image_url($series->image, 1536, 'wide'))],
            ],
            'title'  => $video->title,
            'body'   => $video->description,
        ];

        if ($video->audio_url) {
            $media[] = [
                // TODO: Add getMp3UrlAttribute() method to Video class and replace this concatenation
                'url'          => 'http://feeds.soundcloud.com/stream/' . $video->soundcloud_track_id . '-faithpromise-' . $video->soundcloud_track_permalink . '.mp3',
                'format'       => 'mp3',
                'downloadable' => 'true',
                'images'       => [
                    ['width' => 320, 'url' => open_graph_url_filter(resized_image_url($series->image, 320, 'wide'))],
                    ['width' => 640, 'url' => open_graph_url_filter(resized_image_url($series->image, 640, 'wide'))],
                    ['width' => 768, 'url' => open_graph_url_filter(resized_image_url($series->image, 768, 'wide'))],
                    ['width' => 1536, 'url' => open_graph_url_filter(resized_image_url($series->image, 1536, 'wide'))],
                ]
            ];
        }

        $output['media'] = $media;

        return $output;

    }

}
