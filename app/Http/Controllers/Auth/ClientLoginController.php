<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest.client')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.client.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/client/shop');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/client/login');
    }
}
