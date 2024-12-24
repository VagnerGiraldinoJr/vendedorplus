<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientRegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BannerController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

// Página inicial para visitantes com carrossel e login integrado
Route::get('/', [WelcomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Logout compartilhado
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Área Administrativa (Guard web + Role admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth:web', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/clients', ClientController::class)->names('clients');
    Route::resource('/orders', OrderController::class)->names('orders');
    Route::resource('/products', ProductController::class)->names('products');
});

/*
|--------------------------------------------------------------------------
| Área da Loja para Usuários Comuns (Guard web + Role user)
|--------------------------------------------------------------------------
*/
Route::prefix('shop')->middleware(['auth:web', 'role:user'])->name('shop.')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/{id}', [ShopController::class, 'show'])->name('shop.show');
});

/*
|--------------------------------------------------------------------------
| Área da Loja para Clientes (Guard client)
|--------------------------------------------------------------------------
*/
Route::prefix('client')->middleware(['auth:client'])->name('client.')->group(function () {
    Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('password/edit', [ProfileController::class, 'password'])->name('password.edit');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
});

/*
|--------------------------------------------------------------------------
| Redirecionamento Pós-Login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->get('/redirect', function () {
    if (Auth::guard('client')->check()) {
        return redirect()->route('client.shop.index');
    }

    if (Auth::user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('shop.index');
})->name('redirect');

/*
|--------------------------------------------------------------------------
| Perfil Compartilhado (Acesso autenticado)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Grupo de rotas protegidas para o Admin (Acesso autenticado)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('banners', BannerController::class);
});

/// Formulário de Cadastro
Route::get('/register/client', [ClientRegistrationController::class, 'showRegistrationForm'])->name('clients.register');

// Processamento do Cadastro
Route::post('/register/client', [ClientRegistrationController::class, 'store'])->name('clients.store');
