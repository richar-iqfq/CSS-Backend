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
            $table->unsignedBigInteger('especie_id');
            $table->string('valor_reportado', 3);
            
            for ($i=1; $i <=5 ; $i++) { 
                $table->float('ka'.$i, 30, 15)->nullable();
            }

            for ($i=1; $i <=5 ; $i++) { 
                $table->float('pka'.$i, 30, 15)->nullable();
            }

            $table->float('fuerza_ionica', 5, 4);
            $table->string('nota', 30);
            $table->unsignedBigInteger('referencia_id');

            /**
             * Foreign keys
             */
            // Especie
            $table->foreign('especie_id')
                ->references('id')
                ->on('especies');

            // Referencia
            $table->foreign('referencia_id')
                ->references('id')
                ->on('referencias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constante_acidas');
    }
};
