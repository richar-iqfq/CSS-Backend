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
        Schema::create('molecule_data', function (Blueprint $table) {
            $table->string('id', 10)->primary()->unique();
            $table->integer('NAtoms')->unsigned();
            $table->float('Homo', 10, 6);
            $table->float('Lumo', 10, 6);
            $table->float('Ecorr', 11, 9);
            $table->float('HF', 15, 12);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('molecule_data');
    }
};
