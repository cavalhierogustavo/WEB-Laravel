<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Esporte;
use App\Models\Posicao;

class PosicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ⚽ Futebol
        $futebol = Esporte::where('nomeEsporte', 'Futebol')->first();
        if ($futebol) {
            $posicoesFutebol = [
                'Goleiro',
                'Zagueiro',
                'Lateral Direito',
                'Lateral Esquerdo',
                'Volante',
                'Meia',
                'Atacante',
                'Centroavante',
            ];
            foreach ($posicoesFutebol as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $futebol->id,
                ]);
            }
        }

        // 🏐 Vôlei
        $volei = Esporte::where('nomeEsporte', 'Vôlei')->first();
        if ($volei) {
            $posicoesVolei = [
                'Levantador',
                'Oposto',
                'Central',
                'Ponteiro',
                'Líbero',
            ];
            foreach ($posicoesVolei as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $volei->id,
                ]);
            }
        }

        // 🏀 Basquete
        $basquete = Esporte::where('nomeEsporte', 'Basquete')->first();
        if ($basquete) {
            $posicoesBasquete = [
                'Armador',
                'Ala',
                'Ala-armador',
                'Ala-pivô',
                'Pivô',
            ];
            foreach ($posicoesBasquete as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $basquete->id,
                ]);
            }
        }

        // 🤾‍♂️ Handebol
        $handebol = Esporte::where('nomeEsporte', 'Handebol')->first();
        if ($handebol) {
            $posicoesHandebol = [
                'Goleiro',
                'Pivô',
                'Armador Central',
                'Armador Direito',
                'Armador Esquerdo',
                'Ponta Direita',
                'Ponta Esquerda',
            ];
            foreach ($posicoesHandebol as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $handebol->id,
                ]);
            }
        }

        // 🎾 Tênis
        $tenis = Esporte::where('nomeEsporte', 'Tênis')->first();
        if ($tenis) {
            Posicao::create([
                'nomePosicao' => 'Tenista',
                'idEsporte' => $tenis->id,
            ]);
        }

        // 🏃 Atletismo
        $atletismo = Esporte::where('nomeEsporte', 'Atletismo')->first();
        if ($atletismo) {
            $posicoesAtletismo = [
                'Velocista',
                'Fundista',
                'Saltador',
                'Lançador',
                'Maratonista',
            ];
            foreach ($posicoesAtletismo as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $atletismo->id,
                ]);
            }
        }

        // 🏊 Natação
        $natacao = Esporte::where('nomeEsporte', 'Natação')->first();
        if ($natacao) {
            $posicoesNatacao = [
                'Nadador Crawl',
                'Nadador Costas',
                'Nadador Peito',
                'Nadador Borboleta',
                'Nadador Medley',
            ];
            foreach ($posicoesNatacao as $posicao) {
                Posicao::create([
                    'nomePosicao' => $posicao,
                    'idEsporte' => $natacao->id,
                ]);
            }
        }
    }
}
