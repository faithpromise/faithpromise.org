<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class SiteMapController extends BaseController {

    public function index() {

        $routes = Route::getRoutes();

        $urls = [];

        foreach ($routes as $route) {

            $path = $route->getPath();

            if (starts_with($path, '_')) {
                continue;
            }

            $params = $route->parameterNames();

            if (count($params)):

                // Get all the urls for the given route
                dd($route);
                $urls = array_merge($urls, $this->get_urls($path, $params));

            else:
                $urls[] = url($route->getPath());
            endif;

        }

        return response()->json($urls);
    }

    private function get_urls($path, $params) {

        dd(class_basename($params[0]));
        dd($params[0]);
        return [url($path)];

    }

    private function replace_params($path, $param) {

    }
}
