<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if (auth()->check() && auth()->user()->is_admin) {
            // The user is authenticated and an admin; allow request to proceed
            return $next($request);
        }

        // If the user is not authenticated or not an admin, redirect or abort
        return redirect('/')->with('error', 'You do not have permission to access this page.');
        // Or use abort(403, 'Unauthorized action.');
    }
}
