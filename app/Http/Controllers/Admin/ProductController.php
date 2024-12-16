<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo_produto' => 'required|unique:products',
            'nome_produto' => 'required',
            'preco' => 'nullable|numeric',
            'estoque' => 'nullable|integer',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'codigo_produto' => 'required|unique:products,codigo_produto,' . $product->id,
            'nome_produto' => 'required',
            'preco' => 'nullable|numeric',
            'estoque' => 'nullable|integer',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
