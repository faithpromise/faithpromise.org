<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\MissionLocation;
use FaithPromise\Shared\Models\Series;
use FaithPromise\Shared\Models\Staff;
use FaithPromise\Shared\Models\Video;
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
