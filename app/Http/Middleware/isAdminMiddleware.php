<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {

                return $next($request);
            } else if (Auth::user()->role == 'admin') {
                return redirect('/');
            } else if (Auth::user()->role == 'vendor') {
                return redirect('/vendor/dashboard');
            }
        } else {
            return redirect('/login')->with('status', 'login first please!!!');
        }
    }
}
