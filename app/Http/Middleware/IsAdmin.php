<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Only allow user with ID 1
        if (Auth::check() && Auth::id() == 1) {
            return $next($request);
        }

        // Redirect or abort if not admin
        return abort(403, 'Unauthorized action.');
    }
}

