<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Obtém o usuário autenticado pelo guard 'web'
        dd($user);
        return view('admin.dashboard', compact('user'));
    }

    public function dashboard()
    {
        $menu = [
            ['text' => 'Dashboard', 'url' => route('admin.dashboard'), 'icon' => 'fas fa-tachometer-alt'],
            ['text' => 'Users', 'url' => route('admin.clients.index'), 'icon' => 'fas fa-users'],
            ['text' => 'Orders', 'url' => route('admin.orders.index'), 'icon' => 'fas fa-shopping-cart'],
            ['text' => 'Products', 'url' => route('admin.products.index'), 'icon' => 'fas fa-box'],
            ['text' => 'Banners', 'url' => route('banners.index'), 'icon' => 'fas fa-image'],
        ];


        return view('admin.dashboard', [
            'user' => auth()->user(),
            'menu' => $menu,
        ]);
    }
}
