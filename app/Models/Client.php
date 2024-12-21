<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Client extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['nome', 'email', 'celular', 'senha', 'cpf'];
    protected $hidden = ['senha'];
}

