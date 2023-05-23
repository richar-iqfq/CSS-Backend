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
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('formula', 40);
            $table->unsignedBigInteger('clase_acido_id');
            $table->unsignedBigInteger('clase_carga_id');

            
            /**
             * Foreign keys
             */
            // Clase acido
            $table->foreign('clase_acido_id')
                ->references('id')
                ->on('clase_acidos');
            
            // Clase carga
            $table->foreign('clase_carga_id')
                ->references('id')
                ->on('clase_cargas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies');
    }
};
