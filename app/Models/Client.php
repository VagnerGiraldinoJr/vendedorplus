<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'celular',
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define o guard padrão para atribuição de roles.
     */
    public function guardName()
    {
        return 'web';
    }

    /**
     * Criptografa a senha automaticamente.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
