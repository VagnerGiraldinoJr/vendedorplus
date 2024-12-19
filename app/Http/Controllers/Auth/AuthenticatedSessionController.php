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
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica o usuário
        $request->authenticate();

        // Regenera a sessão para evitar o fixação de sessão
        $request->session()->regenerate();

        // Obtém o usuário autenticado
        $user = Auth::user();

        // Verifica o papel do usuário e faz o redirecionamento adequado
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard'); // Redireciona para a dashboard do admin
        } else {

            return redirect()->route('shop.index'); // Redireciona para a loja (para usuários comuns)
        }
    }

    /**
     * Faz o logout do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Realiza o logout
        Auth::guard('web')->logout();

        // Invalida a sessão do usuário
        $request->session()->invalidate();

        // Regenera o token CSRF
        $request->session()->regenerateToken();

        // Redireciona para a página inicial
        return redirect('/');
    }
}
