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
        Schema::create('pal_attrs', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable()->comment('屬性名稱');
            $table->string('zh_name')->nullable()->comment('屬性名稱');
            $table->integer('number')->comment('數值');
            $table->string('description')->comment('描述');
            $table->string('type')->comment('屬性類型');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pal_attrs');
    }
};
