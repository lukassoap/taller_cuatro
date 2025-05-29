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
        Schema::create('Solicitud', function (Blueprint $table) { //cambie en vez de sokicituds a eso nuevo
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('tema');
            $table->string('area');
            $table->string('estado');
            $table->string('observaciones');
            $table->boolean('usuario_externo'); //cambie esto de string a boolean
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
