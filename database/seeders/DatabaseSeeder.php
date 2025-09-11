<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// A linha 'use database\seeder\AdminSeeder;' foi removida daqui, pois não é necessária.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Remova ou comente qualquer chamada a seeders que não existem, como 'EsporteSeeder'.
        // $this->call(EsporteSeeder::class);

        // Adicione a chamada para o seu AdminSeeder aqui:
        $this->call(AdminSeeder::class);
    }
}

