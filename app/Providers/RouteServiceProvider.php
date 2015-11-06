<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router) {
        //

        parent::boot($router);

        $router->model('campus', 'FaithPromise\Shared\Models\Campus');
        $router->model('study', 'FaithPromise\Shared\Models\Study');
        $router->model('event', 'FaithPromise\Shared\Models\Event');
        $router->model('organization', 'FaithPromise\Shared\Models\Organization');
        $router->model('staff', 'FaithPromise\Shared\Models\Staff');
        $router->model('series', 'FaithPromise\Shared\Models\Series');
        $router->bind('series_video', function($value, $route) {
            $series = $route->parameter('series');
            return \FaithPromise\Shared\Models\Video::where('series_id', '=', $series->id)->where('slug', '=', $value)->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router) {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
