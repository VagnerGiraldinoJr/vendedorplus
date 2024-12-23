<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // 10 produtos por página
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
            'nome_produto' => 'required|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'imagem_principal' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('imagem_principal')) {
            $validated['imagem_principal'] = $request->file('imagem_principal')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'codigo_produto' => 'required|unique:products,codigo_produto,' . $product->id,
            'nome_produto' => 'required|string',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'imagem_principal' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('imagem_principal')) {
            if ($product->imagem_principal) {
                Storage::disk('public')->delete($product->imagem_principal);
            }
            $validated['imagem_principal'] = $request->file('imagem_principal')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        if ($product->imagem_principal) {
            Storage::disk('public')->delete($product->imagem_principal);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
