<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Defina um Gate para administradores
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });

        // Defina um Gate para usuários
        Gate::define('isUser', function ($user) {
            return $user->role === 'user';
        });
    }
}
