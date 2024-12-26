<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'client':
                    return redirect()->route('client.welcome');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect('/home');
            }
        }

        return $next($request);
    }
}
