<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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

        return view('landing', compact('siteData', 'banners'));
    }
}
