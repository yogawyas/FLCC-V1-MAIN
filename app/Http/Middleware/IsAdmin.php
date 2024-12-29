<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('admin')->user() && auth('admin')->user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
