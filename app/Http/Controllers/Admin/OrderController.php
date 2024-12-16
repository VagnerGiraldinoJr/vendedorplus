<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required',
            'total' => 'required|numeric',
        ]);

        $order = Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('admin.orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required',
            'total' => 'required|numeric',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido excluído com sucesso!');
    }

    public function myOrders()
    {
        $orders = auth()->user()->orders; // Assumindo que a relação já existe entre Cliente e Pedido
        return view('shop.orders', compact('orders'));
    }
}
