<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpsFormMiddleware
{
    // public function handle(Request $request, Closure $next)
    // {
    //     $response = $next($request);

    //     $response->headers->set('Content-Security-Policy', "upgrade-insecure-requests; default-src https: data: 'unsafe-inline' 'unsafe-eval';");

    //     return $response;
    // }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $csp = "upgrade-insecure-requests; default-src https: data: 'unsafe-inline' 'unsafe-eval'; script-src https: data: 'unsafe-inline' 'unsafe-eval'; style-src https: data: 'unsafe-inline'; img-src 'self' data: https:; connect-src https:;";

        if (config('app.env') === 'local') {
            $csp = "upgrade-insecure-requests; default-src http: https: data: 'unsafe-inline' 'unsafe-eval'; script-src http: https: data: 'unsafe-inline' 'unsafe-eval'; style-src http: https: data: 'unsafe-inline'; img-src http: https: data: 'self'; connect-src http: https:;";
        }

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
