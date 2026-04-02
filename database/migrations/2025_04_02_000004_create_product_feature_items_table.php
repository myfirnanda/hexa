<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_feature_items', function (Blueprint $table) {
            $table->id();
            $table->string('text', 500);
            $table->integer('sort_order')->default(0);
            $table->foreignId('feature_id')
                ->constrained('product_features')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_feature_items');
    }
};
