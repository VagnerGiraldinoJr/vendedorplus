<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // 🚀 1️⃣ Autenticação pelo Guard 'client'
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('client.welcome')); // ✅ Cliente autenticado
        }

        // 🚀 2️⃣ Autenticação pelo Guard 'web'
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::guard('web')->user();

            if ($user->hasRole('admin')) {

                return redirect()->intended(route('admin.dashboard')); // ✅ Admin autenticado
            }

            return redirect()->intended(route('client.shop.index')); // ✅ Usuário comum
        }

        // ⚠️ 3️⃣ Falha na Autenticação
        return back()->withErrors([
            'email' => 'Credenciais inválidas. Verifique seu email e senha.',
        ])->withInput();
    }

    /**
     * Faz o logout do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 🚀 Logout para Guard 'web'
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        // 🚀 Logout para Guard 'client'
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
        }

        // ✅ Invalida a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ Redireciona para a página inicial
        return redirect('/')->with('success', 'Logout bem-sucedido!');
    }
}
