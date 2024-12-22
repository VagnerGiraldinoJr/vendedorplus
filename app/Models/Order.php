<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // Adicione os campos que você deseja permitir para mass assignment
    protected $fillable = [
        'client_id', // ID do cliente
        'status',    // Status do pedido
        'total',     // Total do pedido
    ];

    /**
     * Relacionamento com Client
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
