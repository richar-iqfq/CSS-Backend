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
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('formula', 40);
            $table->boolean('calculatedMolarWeight');
            $table->float('molarWeight', 8, 4);
            $table->float('density', 8, 4)->nullable();
            $table->float('meltingPoint', 8, 4)->nullable();
            $table->float('boilingPoint', 8, 4)->nullable();
            $table->unsignedBigInteger('acidType_id');
            $table->unsignedBigInteger('chargeType_id');
            
            /**
             * Foreign keys
             */
            // Clase acido
            $table->foreign('acidType_id')
                ->references('id')
                ->on('acidTypes');
            
            // Clase carga
            $table->foreign('chargeType_id')
                ->references('id')
                ->on('chargeTypes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
