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
        Schema::create('pal_mixes', function (Blueprint $table) {
            $table->id();
            $table->string('pal_id_1')->index()->comment('Pal ID 1');
            $table->string('pal_id_2')->index()->comment('Pal ID 2');
            $table->string('pal_id_result')->index()->comment('Pal ID Result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pal_mixes');
    }
};
