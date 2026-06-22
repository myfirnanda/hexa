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
        Schema::table('page_banners', function (Blueprint $table) {
            $table->string('hero_title_id', 500)->nullable()->after('hero_title');
            $table->string('hero_description_id', 1000)->nullable()->after('hero_description');
            $table->string('button_text_id', 100)->nullable()->after('button_text');
        });
    }

    public function down(): void
    {
        Schema::table('page_banners', function (Blueprint $table) {
            $table->dropColumn(['hero_title_id', 'hero_description_id', 'button_text_id']);
        });
    }
};
