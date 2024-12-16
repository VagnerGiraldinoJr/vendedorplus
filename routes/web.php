<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rotas públicas (não autenticadas)
Route::get('/', [ShopController::class, 'welcome'])->name('home'); // Página inicial
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index'); // Página de produtos
Route::get('/product/{id}', [ShopController::class, 'show'])->name('product.show'); // Detalhes do produto

// Rotas de autenticação (para visitantes apenas)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Página de login
    Route::post('/login', [AuthenticatedSessionController::class, 'store']); // Processar login
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register'); // Página de registro
    Route::post('/register', [RegisteredUserController::class, 'store']); // Processar registro
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request'); // Página de recuperação de senha
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email'); // Processar recuperação
});

// Rota de logout
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home'); // Redirecionar para a página inicial após logout
})->name('logout');

// Rotas autenticadas (usuários logados)
Route::middleware('auth')->group(function () {
// Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Redirecionamento pós-login
    Route::get('/redirect', function () {
        return auth()->user()->hasRole('admin')
            ? redirect()->route('admin.dashboard')
            : redirect()->route('shop.index');
    })->name('redirect');
});

// Rotas administrativas (restritas a administradores)
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
