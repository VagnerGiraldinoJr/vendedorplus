<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCaches extends Command
{
    /**
     * O nome e assinatura do comando Artisan.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * A descrição do comando Artisan.
     *
     * @var string
     */
    protected $description = 'Limpa todas as configurações, caches, rotas, visualizações e otimizações';

    /**
     * Execute o comando.
     */
    public function handle()
    {
        $this->info('🔄 Limpando todas as configurações, caches, rotas, visualizações e otimizações...');

        // Array de comandos para limpar
        $commands = [
            'config:clear' => '✅ Configurações limpas',
            'cache:clear' => '✅ Cache limpo',
            'route:clear' => '✅ Rotas limpas',
            'view:clear' => '✅ Visualizações limpas',
            'optimize:clear' => '✅ Otimizações limpas',
        ];

        foreach ($commands as $command => $message) {
            try {
                $this->call($command);
                $this->info($message);
            } catch (\Exception $e) {
                $this->error("❌ Erro ao executar {$command}: {$e->getMessage()}");
            }
        }

        // Recriar caches para produção (Opcional)
        try {
            $this->call('config:cache');
            $this->info('✅ Cache de configurações criado');

            $this->call('route:cache');
            $this->info('✅ Cache de rotas criado');
        } catch (\Exception $e) {
            $this->error("❌ Erro ao criar caches: {$e->getMessage()}");
        }

        $this->info('🎯 Todas as operações foram concluídas com sucesso!');
    }
}
