<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedUsernames = ['nisa06', 'fanisabachdar'];

        if (auth()->guest() || !in_array(auth()->user()->username, $allowedUsernames)) {
            abort(403, 'Unauthorized action.');
        }
        
        return $next($request);
    }
}
