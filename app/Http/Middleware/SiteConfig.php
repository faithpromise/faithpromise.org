<?php

namespace App\Http\Middleware;

use Closure;

class SiteConfig {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $config = app('config');
        $is_student_site = $request->getHost() == $config->get('site.students_domain');
        $site = $is_student_site ? $config->get('site-students') : $config->get('site-faithpromise');

        $config->set('site', array_merge($config['site'], $site));

        return $next($request);
    }
}
