<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Adicione os campos que você deseja permitir para mass assignment
    protected $fillable = [
        'client_id', // ID do cliente
        'status',    // Status do pedido
        'total',     // Total do pedido
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
