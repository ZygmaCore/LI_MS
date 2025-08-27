<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (! in_array($request->user()->role, $roles)) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
