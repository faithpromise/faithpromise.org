<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Event;
use App\MissionLocation;
use App\Series;
use App\Staff;
use App\Video;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class SiteMapController extends BaseController {

    public function index() {

        $urls = [];
        $routes = Route::getRoutes();

        foreach ($routes as $route) {

            $path = $route->getPath();
            $actions = $route->getAction();
            $params = $route->parameterNames();
            $controller = $actions['controller'];

            if (starts_with($path, '_') OR str_contains($controller, 'RedirectController') OR count($params)) {
                continue;
            }

            $urls[] = url($path);
        }

        foreach (Campus::all() as $item) {
            $urls[] = url($item->url);
        }

        foreach (Event::all() as $item) {
            $urls[] = url($item->url);
        }

        foreach (Series::withDrafts()->get() as $item) {
            $urls[] = url($item->url);
        }

        foreach (Staff::all() as $item) {
            $urls[] = url($item->url);
        }

        foreach (MissionLocation::all() as $item) {
            $urls[] = url($item->url);
        }

        foreach (Video::withDrafts()->get() as $item) {
            $urls[] = url($item->url);
        }

        return response()->json($urls);

    }

}
