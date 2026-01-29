<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Check of de gebruiker is ingelogd EN of is_admin true is
    if (! $request->user() || ! $request->user()->is_admin) {
        abort(403, 'Unauthorized. Not an administrator!');
    }

    return $next($request);
}
}
