<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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


// Carregar as rotas do Breeze ou Fortify
require __DIR__ . '/auth.php';
