<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * return void
     * @param Request $request
     */
    public function boot(Request $request) {

        view()->composer('*', function ($view) use ($request) {

            $in_app_default = $request->input('in_app') !== null;
            $in_app = Cookie::get('in_app', $in_app_default);

            $view->with('in_app', $in_app);
            $view->with('site', config('site'));

        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        //
    }
}