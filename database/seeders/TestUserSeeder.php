<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Garantir que a role 'admin' exista
        if (!Role::where('name', 'user')->exists()) {
            Role::create(['name' => 'user']);
        }

        // Criar ou atualizar o usuário user
        $admin = User::updateOrCreate(
            ['email' => 'teste@vendedorplus.com'],
            [
                'name' => 'Usuário Teste',
                'email' => 'teste@vendedorplus.com',
                'password' => bcrypt('teste'),
            ]
        );

        // Atribuir a role 'user' ao usuário
        if (!$admin->hasRole('user')) {
            $admin->assignRole('user');
        }

        $this->command->info('Usuário Teste criado/atualizado com sucesso!');
    }
}
