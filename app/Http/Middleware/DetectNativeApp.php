<?php

namespace App\Http\Middleware;

use Closure;

class DetectNativeApp {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if ($request->input('in_app') !== null) {
            return $next($request)->withCookie(cookie()->forever('in_app', true));
        }

        return $next($request);

    }
}
