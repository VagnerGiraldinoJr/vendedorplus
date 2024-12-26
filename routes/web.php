<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ClientLoginController;
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
// Página inicial para visitantes
Route::get('/', [WelcomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Rotas de Autenticação para Usuários (Guard Web)
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
Route::prefix('admin')
    ->middleware(['auth:web', 'role:admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('/clients', ClientController::class)->names('clients');
        Route::resource('/orders', OrderController::class)->names('orders');
        Route::resource('/products', ProductController::class)->names('products');
    });

/*
|--------------------------------------------------------------------------
| Área da Loja para Usuários Comuns (Guard web + Role user)
|--------------------------------------------------------------------------
*/
Route::prefix('shop')
    ->middleware(['auth:web', 'role:user'])
    ->name('shop.')
    ->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/{id}', [ShopController::class, 'show'])->name('show');
    });

/*
|--------------------------------------------------------------------------
| Área da Loja para Clientes (Guard client)
|--------------------------------------------------------------------------
*/
Route::prefix('client')
    ->middleware(['auth:client'])
    ->name('client.')
    ->group(function () {
        Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
        Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/password/edit', [ProfileController::class, 'password'])->name('password.edit');
        Route::get('/orders', [App\Http\Controllers\Client\OrderController::class, 'index'])->name('orders.index');
    });

/*
|--------------------------------------------------------------------------
| Redirecionamento Pós-Login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->get('/redirect', function () {
    if (Auth::guard('client')->check()) {
        return redirect()->route('client.welcome');
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
| Cadastro de Clientes
|--------------------------------------------------------------------------
*/
Route::get('/register/client', [ClientRegistrationController::class, 'showRegistrationForm'])->name('clients.register');
Route::post('/register/client', [ClientRegistrationController::class, 'store'])->name('clients.store');

/*
|--------------------------------------------------------------------------
| Área de Banners
|--------------------------------------------------------------------------
*/
Route::resource('banners', App\Http\Controllers\BannerController::class)->names([
    'index' => 'banners.index',
    'create' => 'banners.create',
    'store' => 'banners.store',
    'edit' => 'banners.edit',
    'update' => 'banners.update',
    'destroy' => 'banners.destroy',
    'show' => 'banners.show',
]);

/*
|--------------------------------------------------------------------------
| Autenticação para Clientes (Guard client)
|--------------------------------------------------------------------------
*/

// Rotas de Autenticação para Clientes (Acesso para NÃO AUTENTICADOS)
Route::prefix('client')
    ->name('client.')
    ->middleware('guest:client') // Middleware correto para visitantes
    ->group(function () {
        Route::get('/login', [App\Http\Controllers\Auth\ClientLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Auth\ClientLoginController::class, 'login']);
    });

// Rotas para Clientes Autenticados
Route::prefix('client')
    ->name('client.')
    ->middleware('auth:client') // Middleware correto para clientes logados
    ->group(function () {
        Route::post('/logout', [App\Http\Controllers\Auth\ClientLoginController::class, 'logout'])->name('logout');
        Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
        Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
    });
