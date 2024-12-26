<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class Client extends Authenticatable
{
    use Notifiable, HasRoles, HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'cpf',
        'celular',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    protected $guard_name = 'client';
}
