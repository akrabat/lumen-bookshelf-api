<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UnsupportedTypes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $contentType = $request->headers->get('content-type');
        if ($contentType && stripos($contentType, 'application/json') !== 0) {
            return response()->json(['error' => 'Content type must be application/json'], 415);
        }

        return $next($request);
    }
}
