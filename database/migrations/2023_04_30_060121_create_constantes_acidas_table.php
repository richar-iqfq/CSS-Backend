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
            $table->string('formula', 19);
            $table->string('disociacion', 31)->nullable();
            $table->string('tipo', 2);
            $table->integer('paso');
            $table->float('valor_ka', 40, 30)->nullable();
            $table->float('valor_pka', 6, 4)->nullable();
            $table->string('etiquetas', 39);
            
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
