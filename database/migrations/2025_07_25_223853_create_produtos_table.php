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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // id (int, auto incremento, chave primaria)
            $table->string('codigo', 30)->unique(); // codigo(string 30), adicionei unique para evitar duplicados
            $table->string('descricao', 60); // descricao(string 60)
            $table->timestamps(); // created_at(datetime) e updated_at(datetime)
            $table->softDeletes(); // deleted_at(datetime)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};