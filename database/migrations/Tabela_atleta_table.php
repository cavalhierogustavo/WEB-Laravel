<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeCompletoUsuario', 255);
            $table->string('nomeUsuario', 50)->unique()->nullable();
            $table->string('emailUsuario', 255)->unique();
            $table->string('senhaUsuario');
            $table->string('nacionalidadeUsuario', 100)->nullable();
            $table->date('dataNascimentoUsuario');
            $table->string('fotoPerfilUsuario', 300)->nullable();
            $table->string('fotoBannerUsuario', 400)->nullable();
            $table->text('bioUsuario')->nullable();
            $table->decimal('alturaCm', 5, 2)->nullable(); // exemplo: 175.50
            $table->decimal('pesoKg', 5, 2)->nullable();
            $table->enum('peDominante', ['direito', 'esquerdo'])->nullable();
            $table->enum('maoDominante', ['direita', 'esquerda'])->nullable();
            $table->string('generoUsuario', 100)->nullable();
            $table->string('esporte', 100)->nullable();
            $table->string('posicao', 100)->nullable();
            $table->string('estadoUsuario', 100)->nullable();
            $table->string('cidadeUsuario', 100)->nullable();
            $table->string('categoria', 100)->nullable();
            $table->string('temporadasUsuario', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atletas');
    }
};
