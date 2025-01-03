<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->user() && auth('web')->user()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Unauthorized access.');
    }
}
