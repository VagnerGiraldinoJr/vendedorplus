<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        // Registrando o menu com base no papel do usuário
        app()->singleton('adminlte.menu', function () {
            $user = Auth::user(); // Usando Auth corretamente como facade
            $menu = [
                // Itens comuns para todos os usuários
                [
                    'type' => 'navbar-search',
                    'text' => 'search',
                    'topnav_right' => true,
                ],
                [
                    'type' => 'fullscreen-widget',
                    'topnav_right' => true,
                ],
            ];

            if ($user) {
                if ($user->hasRole('admin')) {
                    // Itens específicos para administradores
                    $menu = array_merge($menu, [
                        [
                            'text' => 'Dashboard',
                            'url' => 'admin/dashboard',
                            'icon' => 'fas fa-tachometer-alt',
                        ],
                        [
                            'text' => 'Gestão de Usuários',
                            'url' => 'admin/usuarios',
                            'icon' => 'fas fa-users',
                        ],
                    ]);
                } elseif ($user->hasRole('user')) {
                    // Itens específicos para usuários
                    $menu[] = [
                        'text' => 'Meus Pedidos',
                        'url' => 'user/pedidos',
                        'icon' => 'fas fa-box',
                    ];
                }
            }

            return $menu; // Certifique-se de retornar o array corretamente
        });
    }
}
