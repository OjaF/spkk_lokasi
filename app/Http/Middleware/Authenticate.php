<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            // User is not authenticated, redirect to the login page
            return redirect()->route('login.show')->with('error', 'Please log in');
        }

        // User is authenticated, allow the request to proceed
        return $next($request);
    }
}
