<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Dados adicionais para a página inicial, se necessário
        $siteData = [
            'title' => 'VendedorPLUS - Sistema de Gestão de Vendas',
            'description' => 'Um sistema completo para gestão de vendas porta a porta.',
        ];

        return view('landing', compact('siteData'));
    }
}
