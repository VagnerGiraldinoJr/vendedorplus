<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Página inicial (bem-vindo)
    public function welcome()
    {
        return view('welcome'); // Aponta para o arquivo `resources/views/welcome.blade.php`
    }

    // Listar produtos (loja)
    public function index()
    {
        // Aqui você pode buscar os produtos no banco
        $products = [
            ['id' => 1, 'name' => 'Produto 1', 'description' => 'Descrição do Produto 1', 'price' => 100],
            ['id' => 2, 'name' => 'Produto 2', 'description' => 'Descrição do Produto 2', 'price' => 200],
        ];

        return view('shop.index', compact('products')); // Aponta para `resources/views/shop/index.blade.php`
    }

    // Detalhes do produto
    public function show($id)
    {
        // Buscar produto por ID no banco (exemplo fictício)
        $product = [
            'id' => $id,
            'name' => "Produto $id",
            'description' => "Descrição detalhada do Produto $id",
            'price' => rand(50, 300)
        ];

        return view('shop.show', compact('product')); // Aponta para `resources/views/shop/show.blade.php`
    }
}
