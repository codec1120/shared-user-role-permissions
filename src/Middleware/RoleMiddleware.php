<?php

namespace SharedRolePermission\Shared\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();

        if (!$user || !$user->hasRole($role)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
