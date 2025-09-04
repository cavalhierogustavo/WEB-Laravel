<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Esporte;
use App\Models\Usuario;


class Clube extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clubes';

     protected $fillable = [
        'nomeClube',
        'email',
        'cidadeClube',
        'estadoClube',
        'anoCriacaoClube',
        'esporte',
        'categoria',
        'interesse', // Adicionei interesse que estava no form
        'cnpjClube',
        'enderecoClube',
        'bioClube',
        'senhaClube',
    ];

public function getAuthPassword()
    {
        return $this->senhaClube;
    }


    function esportes()
    {
        return $this->belongsToMany(Esporte::class);
    }
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }
}
