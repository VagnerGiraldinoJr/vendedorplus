<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.dashboard');
    }


    public function store(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            // Verifica a role do usuário e redireciona para a página apropriada
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('shop.index');
            }
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/shop'); // Redireciona para a página inicial
    }

    private function validateLogin(Request $request)
    {
    }

    private function attemptLogin(Request $request)
    {
    }

    private function incrementLoginAttempts(Request $request)
    {
    }

    private function sendFailedLoginResponse(Request $request)
    {
    }
}
