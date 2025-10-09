<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clubes', function (Blueprint $table) {
            // Tornando todos os campos potencialmente problemáticos em opcionais (nullable)
            $table->string('esporteClube')->nullable()->change();
            $table->string('interesseClube')->nullable()->change();
            $table->string('categoriaClube')->nullable()->change();
            $table->string('cnpjClube')->nullable()->change();
            $table->string('telefoneClube')->nullable()->change();
            $table->string('cidadeClube')->nullable()->change();
            $table->string('estadoClube')->nullable()->change();
            $table->text('descricaoClube')->nullable()->change();
            // Adicione qualquer outra coluna que não seja nome, email ou senha.
        });
    }

    public function down(): void
    {
        // Este método reverte as alterações, se necessário
        Schema::table('clubes', function (Blueprint $table) {
            $table->string('esporteClube')->nullable(false)->change();
            $table->string('interesseClube')->nullable(false)->change();
            $table->string('categoriaClube')->nullable(false)->change();
            // etc...
        });
    }
};
