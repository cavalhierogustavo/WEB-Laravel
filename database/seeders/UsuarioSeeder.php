<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 1; $i <= 10; $i++) {
            Usuario::create([
                'nomeCompletoUsuario' => $faker->name(),
                'dataNascimentoUsuario' => $faker->date('Y-m-d', '2010-01-01'),
                'generoUsuario' => $faker->randomElement(['Masculino', 'Feminino', 'Outro']),
                'estadoUsuario' => $faker->state(),
                'cidadeUsuario' => $faker->city(),
                'alturaCm' => $faker->numberBetween(150, 200),
                'pesoKg' => $faker->numberBetween(45, 100),
                'emailUsuario' => $faker->unique()->safeEmail(),
                'senhaUsuario' => Hash::make('12345678'),
                'peDominante' => $faker->randomElement(['Direito', 'Esquerdo']),
                'maoDominante' => $faker->randomElement(['Direita', 'Esquerda']),
            ]);
        }
    }
}
