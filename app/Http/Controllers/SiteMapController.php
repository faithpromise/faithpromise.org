<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use ReflectionClass;
use ReflectionFunction;

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

                $urls = array_merge($urls, $this->get_urls($path, $params));

            else:
                $urls[] = url($route->getPath());
            endif;

        }

        return response()->json($urls);
    }

    private function get_urls($path, $params) {

        $param = $params[0];
        $binders = $this->getRouteBinders();

        if (array_key_exists($param, $binders)):
            $binder = $binders[$param];
            $class = (new ReflectionFunction($binder))->getStaticVariables()['class'];
            $model = app($class);
            $items = $model->get();

            foreach($items as $item) {
                
            }

            dd($items);
        endif;

        dd($path);


        return [url($path)];

    }

    private function replace_params($path, $param) {

    }

    private function getRouteBinders() {

        if (!isset($this->binders)):
            $router = app('router');
            $reflectionRouter = new ReflectionClass($router);
            $binders = $reflectionRouter->getProperty('binders');
            $binders->setAccessible(true);
            $binders = $binders->getValue($router);
            $this->binders = $binders;
        endif;

        return $this->binders;

    }
}
