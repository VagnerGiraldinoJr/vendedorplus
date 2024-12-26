<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function __construct()
    {
        // Garante que apenas visitantes podem acessar a tela de login
        $this->middleware('guest:client')->except('logout');
    }

    /**
     * Exibir o formulário de login.
     */
    public function showLoginForm()
    {
        return view('auth.client.login');
    }

    /**
     * Processar o login.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('client.welcome');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    /**
     * Fazer logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
