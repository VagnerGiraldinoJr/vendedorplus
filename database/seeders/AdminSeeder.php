<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Garantir que a role 'admin' exista
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        // Criar ou atualizar o usuário admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@vendedorplus.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@vendedorplus.com',
                'password' => bcrypt('admin123456'),
            ]
        );

        // Atribuir a role 'admin' ao usuário
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        $this->command->info('Usuário Admin criado/atualizado com sucesso!');
    }
}
