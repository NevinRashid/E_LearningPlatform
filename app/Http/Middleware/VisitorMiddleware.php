<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            return response()->json(['message' => 'Unauthorized access for visitors.'], 403);
        }

        return $next($request);
    }
}
