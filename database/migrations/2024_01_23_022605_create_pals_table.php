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
        Schema::create('pals', function (Blueprint $table) {
            $table->id();
            $table->string('pal_id')->index()->comment('Pal Identifier');
            $table->string('en_name')->nullable()->comment('Name of the Pal English');
            $table->string('zh_name')->nullable()->comment('Name of the Pal Chinese');
            $table->bigInteger('skill_id')->nullable()->comment('Skill of the Pal');
            $table->text('description')->nullable()->comment('Comment of the Pal');
            $table->jsonb('meta')->nullable()->comment('Meta Data');
            $table->tinyInteger('food')->unsigned()->default(0)->comment('Food');
            $table->string('image1')->nullable()->comment('Image');
            $table->string('image2')->nullable()->comment('Image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pals');
    }
};
