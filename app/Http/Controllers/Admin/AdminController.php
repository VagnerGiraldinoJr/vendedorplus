<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Retorne a view para o painel de administração
        return view('admin.dashboard');
    }
}
