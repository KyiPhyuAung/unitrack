<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}