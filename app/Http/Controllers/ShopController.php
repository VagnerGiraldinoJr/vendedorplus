<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Página inicial da loja.
     */
    public function index()
    {
        $products = Product::where('status', 'ativo')->paginate(5); // 9 produtos por página

        return view('client.shop.index', compact('products'));
    }


    /**
     * Detalhes de um produto.
     */
    public function show($id)
    {

        $products = Product::where('status', 'ativo')->paginate(5); // 9 produtos por página
        return view('client.shop.index', compact('products'));
    }
}
