<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$user = Auth::user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->user = $user;
        return $next($request);
    }
}