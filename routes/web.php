<?php
//
//use App\Http\Controllers\Admin\ClientController;
//use App\Http\Controllers\Auth\AuthenticatedSessionController;
//use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\ShopController;
//use App\Http\Controllers\Admin\AdminController;
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Rotas Públicas
//|--------------------------------------------------------------------------
//*/
//
//// Rota inicial
//Route::get('/', function () {
//    return redirect('/login');
//})->name('home');
//
///*
//|--------------------------------------------------------------------------
//| Rotas de Autenticação (Geral)
//|--------------------------------------------------------------------------
//*/
//Route::middleware('guest')->group(function () {
//    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//});
//
//// Logout compartilhado
//Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//
///*
//|--------------------------------------------------------------------------
//| Área Protegida para Administradores
//|--------------------------------------------------------------------------
//*/
//Route::prefix('admin')->middleware(['auth:web', 'role:admin'])->group(function () {
//    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//
//    // Gestão de Clientes
//    Route::resource('/clients', ClientController::class)->names('admin.clients');
//
//    // Gestão de Pedidos
//    Route::resource('/orders', ClientController::class)->names('admin.orders');
//
//    // Gestão de Produtos
//    Route::resource('/products', ClientController::class)->names('admin.products');
//});
//
///*
//|--------------------------------------------------------------------------
//| Área Protegida para Usuários Comuns (Guard web + Role user)
//|--------------------------------------------------------------------------
//*/
//Route::middleware(['auth:web', 'role:user'])->prefix('shop')->name('shop.')->group(function () {
//    Route::get('/', [ShopController::class, 'index'])->name('index'); // shop.index
//    Route::get('/{id}', [ShopController::class, 'show'])->name('show'); // shop.show
//});
//
///*
//|--------------------------------------------------------------------------
//| Área Protegida para Clientes (Guard client)
//|--------------------------------------------------------------------------
//*/
//Route::middleware(['auth:client'])->prefix('client/shop')->name('client.shop.')->group(function () {
//    Route::get('/', [ShopController::class, 'index'])->name('index'); // client.shop.index
//    Route::get('/{id}', [ShopController::class, 'show'])->name('show'); // client.shop.show
//});
//
///*
//|--------------------------------------------------------------------------
//| Rotas Unificadas para Acesso Pós-Login
//|--------------------------------------------------------------------------
//*/
//Route::middleware(['auth'])->group(function () {
//    Route::get('/redirect', function () {
//        $user = Auth::guard('web')->user();
//        $client = Auth::guard('client')->user();
//
//        if ($client) {
//            return redirect('/client/shop');
//        }
//
//        if ($user && $user->hasRole('admin')) {
//            return redirect()->route('admin.dashboard');
//        }
//
//        return redirect()->route('shop.index');
//    })->name('redirect');
//});
//
///*
//|--------------------------------------------------------------------------
//| Rotas de Perfil (Usuários e Admin)
//|--------------------------------------------------------------------------
//*/
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
///*
//|--------------------------------------------------------------------------
//| Dashboard Geral
//|--------------------------------------------------------------------------
//*/
//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
//
///*
//|--------------------------------------------------------------------------
//| Autenticação Adicional
//|--------------------------------------------------------------------------
//*/
//require __DIR__ . '/auth.php';


use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

// Página inicial para visitantes
Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    Route::resource('/orders', ClientController::class)->names('orders');
    Route::resource('/products', ProductController::class)->names('products');
});

/*
|--------------------------------------------------------------------------
| Área da Loja para Usuários Comuns (Guard web + Role user)
|--------------------------------------------------------------------------
*/
Route::prefix('shop')->middleware(['auth:web', 'role:user'])->name('shop.')->group(function () {
    Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('shop/{id}', [ShopController::class, 'show'])->name('shop.show');
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
    // Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    // Route::get('contact', [ContactController::class, 'index'])->name('contact');
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
