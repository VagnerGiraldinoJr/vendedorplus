<?php

namespace App\Http\Controllers;

use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        // Busca produtos ativos com paginação
        $products = Product::where('status', 'ativo')->paginate(6);

        return view('welcome', compact('products'));
    }
}
