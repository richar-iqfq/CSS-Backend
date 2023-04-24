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
        Schema::create('iupac_acid_constants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('entry');
            $table->string('SMILES', 100);
            $table->string('pka_type', 23);
            $table->float('pka_value', 6, 4);
            $table->string('original_iupac_names', 105);
            $table->string('original_iupac_nicknames', 76)->nullable();
            $table->string('acidity_labels', 2);
            $table->string('assessment', 20)->nullable();
            
            $table->string('reference_id', 4);
            $table->foreign('reference_id')->references('id')->on('references');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iupac_acid_constants');
    }
};
