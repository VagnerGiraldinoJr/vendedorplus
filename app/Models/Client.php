<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Client extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Define o nome da tabela.
     */
    protected $table = 'clients';

    /**
     * Define os campos que podem ser preenchidos.
     */
    protected $fillable = [
        'nome',
        'email',
        'celular',
        'cpf',
        'password',
    ];

    /**
     * Define os campos que devem ser ocultos ao retornar dados JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Define os casts dos campos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Criptografa a senha automaticamente ao atribuí-la.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Define o guard padrão para atribuição de roles.
     */
    public function guardName()
    {
        return 'web';
    }

    /**
     * Relacionamento com Orders.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
