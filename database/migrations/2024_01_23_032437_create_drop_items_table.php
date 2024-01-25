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
        Schema::create('drop_items', function (Blueprint $table) {
            $table->id();
            $table->string('en_name')->nullable()->comment('物品名稱');
            $table->string('zh_name')->nullable()->comment('物品名稱');
            $table->string('description')->nullable()->comment('描述');
            $table->text('comment')->nullable()->comment('備註');
            $table->timestamps();
        });

        Schema::create('drop_item_pal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drop_item_id')->constrained('drop_items');
            $table->foreignId('pal_id')->constrained('pals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_items');
    }
};
