<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Esporte;

class EsporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $esportes = [
            [
                'nomeEsporte' => 'Futebol',
                'descricaoEsporte' => 'Esporte coletivo jogado com uma bola entre duas equipes de 11 jogadores. É o esporte mais popular do mundo.',
            ],
            [
                'nomeEsporte' => 'Vôlei',
                'descricaoEsporte' => 'Esporte coletivo em que duas equipes são separadas por uma rede e tentam fazer a bola tocar o chão do campo adversário.',
            ],
            [
                'nomeEsporte' => 'Basquete',
                'descricaoEsporte' => 'Esporte coletivo onde duas equipes tentam marcar pontos arremessando a bola em uma cesta.',
            ],
            [
                'nomeEsporte' => 'Natação',
                'descricaoEsporte' => 'Esporte individual praticado em piscinas ou águas abertas, com diferentes estilos de nado como crawl e borboleta.',
            ],
            [
                'nomeEsporte' => 'Tênis',
                'descricaoEsporte' => 'Esporte individual ou em duplas, jogado com raquetes e bola, em quadras de diferentes tipos de piso.',
            ],
            [
                'nomeEsporte' => 'Atletismo',
                'descricaoEsporte' => 'Modalidade esportiva que engloba corridas, saltos, arremessos e lançamentos.',
            ],
            [
                'nomeEsporte' => 'Handebol',
                'descricaoEsporte' => 'Esporte coletivo jogado com as mãos, em que o objetivo é marcar gols no campo adversário.',
            ],
        ];

        foreach ($esportes as $esporte) {
            Esporte::create($esporte);
        }
    }
}
