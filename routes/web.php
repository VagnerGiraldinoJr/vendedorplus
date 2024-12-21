<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rota principal
Route::get('/', function () {
    return redirect('/login');
})->name('home');

// Rotas de autenticação para usuários "guest"
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Rota de logout protegida por "auth"
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas de Admin (com middleware auth e role admin)
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
});

// Rota do Dashboard (com middleware de autenticação)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rotas de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de User (com middleware user e role admin)
Route::prefix('shop')->middleware(['auth', 'role:user'])->name('shop.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ShopController::class, 'index'])->name('index');
});

// Admin - Gestão de Clientes


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/clients', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/clients/create', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/clients', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('/clients/{id}/edit', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin.clients.destroy');
});

// Admin - Gestão de Pedidos
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/orders', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/create', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('admin.orders.create');
    Route::post('/orders', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('admin.orders.store');
    Route::get('/orders/{id}/edit', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{id}', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin.orders.destroy');
});

// Admin - Gestão de Produtos
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/products', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin.products.destroy');
});



// Carregar as rotas do Breeze ou Fortify
require __DIR__ . '/auth.php';
