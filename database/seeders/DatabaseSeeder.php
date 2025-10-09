<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Popula as tabelas primárias que não têm dependências complexas.
        $this->call([
            ClubeSeeder::class,
            AdminSeeder::class,      // Cria os clubes/admins
            EsporteSeeder::class,    // Cria os esportes
            PosicaoSeeder::class,    // Cria as posições (DEVE VIR ANTES DE OPORTUNIDADE)
            UsuarioSeeder::class,    // Cria os usuários
        ]);

        // 2. Por último, popula a tabela de oportunidades, que depende das anteriores.
        $this->call(OportunidadeSeeder::class);
    }
}
