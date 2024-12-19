<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;  // Adicionado para controle da página de admin
use App\Http\Controllers\ShopController;   // Adicionado para controle da página da loja
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rotas de Login e Logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas para Admin - com middleware de autenticação e role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Rotas para Shop (usuários comuns) - com middleware de autenticação e role user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
});

// Rota do Dashboard (com middleware de autenticação)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rota de perfil do usuário, com middleware de autenticação
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function () {
    $user = App\Models\User::find(1); // ID do usuário administrador
    dd([
        'Name' => $user->name,
        'Roles' => $user->getRoleNames(), // Deve listar os papéis atribuídos ao usuário
        'Is Admin' => $user->hasRole('admin'),
        'Is User' => $user->hasRole('user'),
    ]);
});

Route::get('/test-menu', function () {
    $menu = app('adminlte.menu');
    return response()->json($menu);
});



// Carregar rotas de autenticação do Breeze ou Fortify
require __DIR__.'/auth.php';
