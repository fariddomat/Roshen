<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveQueryString
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->url(); // Get the URL without query parameters
        if ($request->getQueryString()) {
            return redirect($url, 301); // Redirect to the URL without the query string
        }
        return $next($request);
    }
}
