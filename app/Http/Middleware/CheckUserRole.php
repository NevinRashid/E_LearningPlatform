<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    use HasRoles;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if(Auth::user()->hasRole('student')){
                return redirect()->route('student');
            }
        }
        return $next($request);
    }
}
