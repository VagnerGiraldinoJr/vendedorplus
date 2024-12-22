<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Autenticação padrão usando guard web
        $user = Auth::guard('web')->user();

        if ($user && $user->hasRole($role, 'web')) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Acesso não autorizado!');
    }
}
