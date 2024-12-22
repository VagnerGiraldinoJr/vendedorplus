<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Lida com a autenticação do usuário.
     */
    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Tenta autenticar como CLIENTE
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/client/shop');
        }

        // Tenta autenticar como USUÁRIO (guard 'web')
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('shop.index');
        }

        // Falha na autenticação
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput();
    }
    /**
     * Faz o logout do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Faz o logout de ambos os guards
        Auth::guard('web')->logout();
        Auth::guard('client')->logout();

        // Invalida a sessão do usuário
        $request->session()->invalidate();

        // Regenera o token CSRF
        $request->session()->regenerateToken();

        // Redireciona para a página inicial
        return redirect('/');
    }
}
