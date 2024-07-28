<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JustCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $disallowedUsernames = ['nisa06', 'fanisabachdar'];

        if (auth()->check() && in_array(auth()->user()->username, $disallowedUsernames)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
