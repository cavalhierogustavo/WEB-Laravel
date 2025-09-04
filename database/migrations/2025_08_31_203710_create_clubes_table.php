<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clubes', function (Blueprint $table) {
            $table->id();
            $table->string('nomeClube');
            $table->string('email')->unique();
            $table->string('cidadeClube');
            $table->string('estadoClube');
            $table->date('anoCriacaoClube');
            $table->string('esporte');
            $table->string('categoria');
            $table->string('interesse'); // <-- ADICIONE ESTA LINHA AQUI
            $table->string('cnpjClube')->unique();
            $table->string('enderecoClube');
            $table->text('bioClube')->nullable();
            $table->string('senhaClube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubes');
    }
};
