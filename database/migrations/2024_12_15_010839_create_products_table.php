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
            $table->string('codigo_produto')->unique();
            $table->string('codigo_referencia')->nullable();
            $table->string('nome_produto');
            $table->enum('tamanho', ['P', 'M', 'G'])->nullable();
            $table->string('cor')->nullable();
            $table->string('nome_reduzido')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->string('codigo_barras_secundario')->nullable();
            $table->string('qrcode')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->text('descricao')->nullable();
            $table->decimal('preco', 10, 2)->nullable();
            $table->decimal('preco_promo', 10, 2)->nullable();
            $table->integer('estoque')->default(0);
            $table->string('imagem_principal')->nullable();
            $table->string('imagem_thumbnail')->nullable();
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
