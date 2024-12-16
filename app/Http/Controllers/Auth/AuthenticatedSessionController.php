<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Exibe a página de login.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Lida com a autenticação do usuário.
     */
    public function store(Request $request)
    {
        // Valida os campos de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            // Verifica o papel do usuário
            $user = Auth::user();
            if (!$user->hasRole('admin')) {
                $user->assignRole('admin'); // Atribui a role caso não tenha
            }

            return redirect()->intended($user->hasRole('admin') ? route('admin.dashboard') : route('shop.index'));
        }

        // Se falhar, lança exceção
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Faz logout do usuário.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
