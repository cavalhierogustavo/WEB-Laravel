<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // Importante: Precisamos do Hash aqui

class Clube extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomeClube',
        'emailClube',
        'senhaClube',
        'cidadeClube',
        'estadoClube',
        'anoCriacaoClube',
        'cnpjClube',
        'enderecoClube',
        'bioClube',
        'esporteClube',
        'interesseClube',
        'categoriaClube',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senhaClube',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        // A propriedade 'hashed' foi removida daqui para garantir compatibilidade
        // com versões mais antigas do Laravel.
        return [
            'anoCriacaoClube' => 'date',
        ];
    }

    /**
     * ✅ ESTE MÉTODO AGORA É O ÚNICO RESPONSÁVEL PELO HASHING ✅
     *
     * Este "mutator" intercepta o valor da senha antes de ser salvo no banco
     * e aplica a criptografia Hash, garantindo que a senha nunca seja
     * salva em texto puro. Funciona em todas as versões do Laravel.
     *
     * @param  string  $value
     * @return void
     */
    public function setSenhaClubeAttribute($value)
    {
        // A verificação 'if (!empty($value))' é uma boa prática para
        // evitar erros se o valor da senha for nulo em alguma operação.
        if (!empty($value)) {
            $this->attributes['senhaClube'] = Hash::make($value);
        }
    }

    /**
     * Get the password for the user.
     * (Este método é importante para o sistema de autenticação do Laravel)
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senhaClube;
    }

    // --- MÉTODOS PARA DESABILITAR O "REMEMBER ME" TOKEN ---
    // (Seu código para isso já estava correto, mantido aqui)

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // Não faz nada
    }

    public function getRememberTokenName()
    {
        return null;
    }
}
