<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresa extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
      'nome', 'nomeEmpresa', 'email', 'password', 'descricao'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function vagas()
    {
        return $this->hasMany(Vaga::class);
    }
}
