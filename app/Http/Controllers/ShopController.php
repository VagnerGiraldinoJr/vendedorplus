<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Página inicial (bem-vindo)
    public function welcome()
    {
        dd('asdasda1111');
        return view('welcome'); // Aponta para o arquivo `resources/views/welcome.blade.php`
    }

    // Listar produtos (loja)
    public function index()
    {
        $user = auth()->user();
        return view('shop.index', compact('user'));


    }

    // Detalhes do produto
    public function show($id)
    {


        return view('shop.show', compact('product')); // Aponta para `resources/views/shop/show.blade.php`
    }

    public function shop()
    {
        $user = auth()->user();
        return view('shop.index', compact('user'));
    }
}
