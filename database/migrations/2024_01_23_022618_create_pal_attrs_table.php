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
        Schema::create('attrs', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable()->comment('屬性名稱');
            $table->string('zh_name')->nullable()->comment('屬性名稱');
            $table->integer('number')->comment('數值');
            $table->text('description')->nullable()->comment('描述');
            $table->timestamps();
        });

        Schema::create('attr_pal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pal_id')->comment('帕魯ID');
            $table->foreignId('attr_id')->comment('屬性ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attrs');
        Schema::dropIfExists('attr_pal');
    }
};
