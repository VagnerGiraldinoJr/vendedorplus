<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Busca os banners no banco de dados
        $banners = Banner::all();

        // Dados adicionais para a página inicial, se necessário
        $siteData = [
            'title' => 'VendedorPLUS - Sistema de Gestão de Vendas',
            'description' => 'Um sistema completo para gestão de vendas porta a porta.',
        ];

        // Verificar se há um usuário logado (guard 'web' ou 'client')
        $user = null;
        $guard = null;

        if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user();
            $guard = 'client';
        } elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
            $guard = 'web';
        }

        return view('landing', compact('siteData', 'banners', 'user', 'guard'));
    }
}
