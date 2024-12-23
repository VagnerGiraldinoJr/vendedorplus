<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Página inicial da loja.
     */
    public function index()
    {

        $user = auth()->user() ?? auth('client')->user();
        return view('shop.index', compact('user'));
    }

    /**
     * Detalhes de um produto.
     */
    public function show($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Produto Exemplo',
            'description' => 'Descrição detalhada do produto.',
            'price' => 99.99,
        ];

        return view('shop.show', compact('product'));
    }
}
