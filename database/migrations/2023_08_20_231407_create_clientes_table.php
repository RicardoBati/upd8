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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 14)->unique();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F']); // Supondo que M é masculino e F é feminino
            $table->string('endereco');
            $table->string('estado');
            $table->string('cidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
