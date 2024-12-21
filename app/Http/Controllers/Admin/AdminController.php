<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        dd('testando o index do admincontroller');
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $menu = [
            ['text' => 'Dashboard', 'url' => '/admin/dashboard', 'icon' => 'fas fa-tachometer-alt'],
            ['text' => 'Users', 'url' => '/admin/users', 'icon' => 'fas fa-users'],
            ['text' => 'Configurações', 'icon' => 'fas fa-cogs'],
            ['text' => 'Ajuda'],
        ];

        return view('admin.dashboard', [
            'user' => auth()->user(),
            'menu' => $menu,
        ]);
    }
}
