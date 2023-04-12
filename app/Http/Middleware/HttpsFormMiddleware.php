<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpsFormMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Content-Security-Policy', "upgrade-insecure-requests; default-src https: data: 'unsafe-inline' 'unsafe-eval';");

        return $response;
    }
}
