<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Defina um Gate para administradores
        Gate::define('isAdmin', function ($user) {
            return $user && $user->hasRole('admin');
        });

        // Defina um Gate para usuários
        Gate::define('isUser', function ($user) {
            return $user && $user->hasRole('user');
        });
    }
}

/*
$user->hasRole('admin') — Agora ele verifica o papel de admin no modelo User, consultando as tabelas model_has_roles e roles.
$user->hasRole('user') — O mesmo para o papel user.
 */
