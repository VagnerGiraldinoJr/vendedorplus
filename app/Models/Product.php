<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'codigo_produto',
        'codigo_referencia',
        'nome_produto',
        'tamanho',
        'cor',
        'nome_reduzido',
        'codigo_barras',
        'codigo_barras_secundario',
        'qrcode',
        'status',
        'descricao',
        'preco',
        'preco_promo',
        'estoque',
        'imagem_principal',
        'imagem_thumbnail',
    ];
}
