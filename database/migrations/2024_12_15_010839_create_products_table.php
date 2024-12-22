<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_produto')->unique(); // Código único do produto
            $table->string('codigo_referencia')->nullable(); // Código de referência externa
            $table->string('nome_produto'); // Nome completo do produto
            $table->enum('tamanho', ['P', 'M', 'G', 'GG', 'XG'])->nullable(); // Mais tamanhos comuns
            $table->string('cor')->nullable(); // Cor do produto
            $table->string('nome_reduzido')->nullable(); // Nome compacto para exibição
            $table->string('codigo_barras')->nullable()->unique(); // Garantir que é único
            $table->string('codigo_barras_secundario')->nullable();
            $table->string('qrcode')->nullable(); // Código QR para identificação
            $table->enum('status', ['ativo', 'inativo'])->default('ativo'); // Status do produto
            $table->text('descricao')->nullable(); // Descrição detalhada
            $table->decimal('preco', 10, 2)->nullable(); // Preço do produto
            $table->decimal('preco_promo', 10, 2)->nullable(); // Preço promocional
            $table->integer('estoque')->default(0); // Quantidade em estoque
            $table->string('imagem_principal')->nullable(); // Imagem principal do produto
            $table->string('imagem_thumbnail')->nullable(); // Imagem em miniatura
            $table->json('especificacoes')->nullable(); // Para especificações técnicas variadas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
