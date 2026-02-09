<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Must be logged in AND role must be 'admin'
        if (!$user || ($user->role ?? null) !== 'admin') {
            abort(403, 'Admins only.');
        }

        return $next($request);
    }
}