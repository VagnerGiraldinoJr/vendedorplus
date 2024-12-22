<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'client':
                    return redirect('/client/shop'); // Clientes são redirecionados para /client/shop
                case 'web':
                    $user = Auth::guard($guard)->user();
                    if ($user->hasRole('admin')) {
                        return redirect('/admin/dashboard'); // Admins vão para /admin/dashboard
                    }
                    return redirect('/shop'); // Usuários comuns vão para /shop
            }
        }

        return $next($request);
    }

}
