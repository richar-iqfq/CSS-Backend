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
        Schema::create('constantes_acidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 33);
            $table->string('formula', 12);
            $table->string('tipo_pka', 5);
            $table->float('valor_pk', 4, 2);
            $table->string('etiqueta', 12);
            $table->string('ion', 6)->nullable();
            $table->integer('conjugado');
            
            $table->unsignedBigInteger('referencia_id');
            $table->foreign('referencia_id')->references('id')->on('referencias');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constantes_acidas');
    }
};
