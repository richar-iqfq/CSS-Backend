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
        Schema::create('reference_specie', function (Blueprint $table) {
            $table->unsignedBigInteger('specie_id');
            $table->unsignedBigInteger('reference_id');

            $table->foreign('specie_id')
                ->references('id')
                ->on('species');

            $table->foreign('reference_id')
                ->references('id')
                ->on('references');
            
            $table->primary(['specie_id','reference_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_specie');
    }
};
