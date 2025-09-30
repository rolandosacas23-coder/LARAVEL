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
        //CREACION DE TABLA NOTAS
        Schema::create('notas',function(Blueprint $table){
            $table->id();
            $table->string('texto');
            $table->datetime('fecha');
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
