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
        Schema::create('acid_constants', function (Blueprint $table) {

            $table->unsignedBigInteger('compound_id');
            $table->foreign('compound_id')->references('id')->on('compounds');

            $table->double('pka1',7, 4);
            $table->double('pka2',7, 4);
            $table->double('pka3',7, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acid_constants');
    }
};
