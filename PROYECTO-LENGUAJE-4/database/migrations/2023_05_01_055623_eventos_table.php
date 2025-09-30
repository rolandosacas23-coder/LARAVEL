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
             //CREACION DE TABLA EVENTOS
        Schema:: create('eventos',function(Blueprint $table){
         
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin'); 
            $table->unsignedBigInteger('contacto_id'); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExits('contactos');
    }
};
