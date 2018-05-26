<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UnacceptableTypes
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
        $accept = $request->headers->get('accept');
        if ($accept && (stripos($accept, 'json') === false) && $accept !== '*/*') {
            return response()->json(['error' => 'You must accept JSON'], 406);
        }

        return $next($request);
    }
}
