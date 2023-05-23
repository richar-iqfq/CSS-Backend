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
        Schema::create('especie_referencia', function (Blueprint $table) {
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('referencia_id');

            $table->foreign('especie_id')
                ->references('id')
                ->on('especies');

            $table->foreign('referencia_id')
                ->references('id')
                ->on('referencias');
            
            $table->primary(['especie_id','referencia_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especie_referencia');
    }
};
