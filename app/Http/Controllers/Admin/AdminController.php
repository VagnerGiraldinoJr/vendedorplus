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
dd('asda');
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $menu = app('adminlte.menu'); // Corrigido, sem os parênteses
        return view('admin.dashboard', compact('user', 'menu'));
    }
}
